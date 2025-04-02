#!/bin/bash

# Prompt for block name
read -p "Enter block name: " block_name

# Exit if empty
if [ -z "$block_name" ]; then
  echo "No block name provided."
  exit 1
fi

# Convert to lowercase and replace spaces
block_slug=$(echo "$block_name" | tr '[:upper:]' '[:lower:]' | tr ' ' '_')
block_kebab=$(echo "$block_name" | tr '[:upper:]' '[:lower:]' | tr ' ' '-')

# Define file paths
php_file="./page-templates/blocks/${block_kebab}.php"
scss_file="./src/sass/theme/blocks/_${block_slug}.scss"
blocks_scss="./src/sass/theme/blocks/_blocks.scss"
blocks_php="./inc/cb-blocks.php"
acf_json_file="./acf-json/group_${block_slug}.json"

# Exit if block already exists, with specific feedback
if [ -f "$php_file" ]; then
  echo "PHP block file already exists: $php_file"
  exit 1
fi

if [ -f "$scss_file" ]; then
  echo "SCSS block file already exists: $scss_file"
  exit 1
fi

if [ -f "$acf_json_file" ]; then
  echo "ACF JSON file already exists: $acf_json_file"
  exit 1
fi


# Grab package name from style.css
style_file="./style.css"
package=$(grep "Text Domain:" "$style_file" | sed 's/.*Text Domain:[ ]*//')

# Create files
echo "<?php
/**
 * Block template for ${block_name}.
 *
 * @package ${package}
 */
" > "$php_file"

touch "$scss_file"
echo "Created: $php_file"
echo "Created: $scss_file"

# Append import to _blocks.scss
if ! grep -q "@import '${block_slug}';" "$blocks_scss"; then
  echo "@import '${block_slug}';" >> "$blocks_scss"
  echo "Added @import to $blocks_scss"
else
  echo "Import already exists in $blocks_scss"
fi

# Insert block registration into cb-blocks.php
block_code=$(cat <<EOF

		acf_register_block_type(
			array(
				'name'            => '${block_slug}',
				'title'           => __( '${block_name}' ),
				'category'        => 'layout',
				'icon'            => 'cover-image',
				'render_template' => 'page-templates/blocks/${block_kebab}.php',
				'mode'            => 'edit',
				'supports'        => array(
					'mode'      => false,
					'anchor'    => true,
					'className' => true,
					'align'     => true,
				),
			)
		);
EOF
)

awk -v code="$block_code" '
  /function acf_blocks\(\)/ {
    print;
    getline;
    print;
    print code;
    next
  }
  { print }
' "$blocks_php" > "${blocks_php}.tmp" && mv "${blocks_php}.tmp" "$blocks_php"
echo "Block registered in $blocks_php"

# Create ACF JSON
acf_json_content="{
  \"key\": \"group_${block_slug}\",
  \"title\": \"${block_name}\",
  \"fields\": [
    {
      \"key\": \"field_${block_slug}_title\",
      \"label\": \"${block_name}\",
      \"name\": \"title\",
      \"type\": \"message\"
    }
  ],
  \"location\": [
    [
      {
        \"param\": \"block\",
        \"operator\": \"==\",
        \"value\": \"acf/${block_kebab}\"
      }
    ]
  ],
  \"active\": 1,
  \"description\": \"\"
}"
echo "$acf_json_content" > "$acf_json_file"
echo "Created ACF field group JSON: $acf_json_file"