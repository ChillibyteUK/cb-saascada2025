// Add your custom JS here.
AOS.init({
  easing: 'ease-in',
  once: true
});

(function() {
  // Hide header on scroll
//   var doc = document.documentElement;
//   var w = window;

//   var prevScroll = w.scrollY || doc.scrollTop;
//   var curScroll;
//   var direction = 0;
//   var prevDirection = 0;

//   var header = document.getElementById('wrapper-navbar');

//   var checkScroll = function() {
//       // Find the direction of scroll (0 - initial, 1 - up, 2 - down)
//       curScroll = w.scrollY || doc.scrollTop;
//       if (curScroll > prevScroll) {
//           // Scrolled down
//           direction = 2;
//       } else if (curScroll < prevScroll) {
//           // Scrolled up
//           direction = 1;
//       }

//       if (direction !== prevDirection) {
//           toggleHeader(direction, curScroll);
//       }

//       prevScroll = curScroll;
//   };

//   var toggleHeader = function(direction, curScroll) {
//       if (direction === 2 && curScroll > 100) {
//           // Replace 52 with the height of your header in px
//           if ( ! document.getElementById('navbar').classList.contains('show')) {
//               header.classList.add('hide');
//               prevDirection = direction;
//           }
//       } else if (direction === 1) {
//           header.classList.remove('hide');
//           prevDirection = direction;
//       }
//   };

//   window.addEventListener('scroll', checkScroll);

  // Header background
//   document.addEventListener('scroll', function() {
//       document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
//           dropdown.classList.remove('show');
//       });
//       document.querySelectorAll('.dropdown-toggle').forEach(function(toggle) {
//           toggle.classList.remove('show');
//           toggle.blur();
//       });
//     });

    // document.addEventListener("DOMContentLoaded", () => {
    //     // Create cursor element
    //     const cursor = document.createElement("div");
    //     cursor.classList.add("custom-cursor");
    //     document.body.appendChild(cursor);
    
    //     // Move cursor with mouse
    //     document.addEventListener("mousemove", (e) => {
    //         cursor.style.left = `${e.clientX}px`;
    //         cursor.style.top = `${e.clientY}px`;
    //     });
    
    //     // Add active class on link hover
    //     document.querySelectorAll("a").forEach((link) => {
    //         link.addEventListener("mouseenter", () => cursor.classList.add("active"));
    //         link.addEventListener("mouseleave", () => cursor.classList.remove("active"));
    //     });
    // });

    document.addEventListener("DOMContentLoaded", () => {
        const cursor = document.createElement("div");
        cursor.classList.add("custom-cursor");
        document.body.appendChild(cursor);
    
        const cards = document.querySelectorAll(".partners__card");

        if (cards.length > 0) {
            // Show custom cursor when entering any .partners__card
            cards.forEach(card => {
                card.addEventListener("mouseenter", () => {
                    cursor.style.opacity = "1";
                });
    
                card.addEventListener("mouseleave", () => {
                    cursor.style.opacity = "0";
                });
    
                // Move cursor inside the .partners__card
                card.addEventListener("mousemove", (e) => {
                    cursor.style.left = `${e.clientX}px`;
                    cursor.style.top = `${e.clientY}px`;
                });
    
                // // Enlarge cursor on links inside the card
                // card.querySelectorAll("a").forEach(link => {
                //     link.addEventListener("mouseenter", () => cursor.classList.add("active"));
                //     link.addEventListener("mouseleave", () => cursor.classList.remove("active"));
                // });
            });
        }
    });

  // Toggle navdark class on nav toggle button click
//   document.getElementById('navToggle').addEventListener('click', function() {
//       var nav = document.getElementById('navbar');
//       nav.classList.toggle('navdark');
//   });

  // Hide menu on click outside
//   document.body.addEventListener('click', function(event) {
//       if (!event.target.closest('.navbar')) {
//           var navbarCollapse = document.querySelector('.navbar .navbar-collapse');
//           if (navbarCollapse) {
//               var collapseInstance = bootstrap.Collapse.getInstance(navbarCollapse);
//               if (collapseInstance) {
//                   collapseInstance.hide();
//               }
//           }
//       }
//   });
})();