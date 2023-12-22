const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});

const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

function requestRecommendation() {
            const produk_pangan = document.getElementById('produk_pangan').value.toLowerCase();
            const produksi_ton = document.getElementById('produksi_ton').value;

            // Make an AJAX request to the Flask server for recommendation
            fetch('/recommend', {
                method: 'POST',
                body: new FormData(document.getElementById('recommendForm')),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    displayRecommendation(data.result);
                } else {
                    alert('Error during recommendation.');
                }
            })
            .catch(error => console.error('Error during recommendation:', error));
        }

        function displayRecommendation(resultJson) {
            const resultDiv = document.getElementById('result');
            const resultData = JSON.parse(resultJson);

            // Clear previous results
            resultDiv.innerHTML = '';

            // Display the recommendation data
            for (const item of resultData.data) {
                resultDiv.innerHTML += `<p>${item[0]}: ${item[2]} Ton</p>`;
            }
        }

// header container
ScrollReveal().reveal(".header__container h1", {
  ...scrollRevealOption,
});

ScrollReveal().reveal(".header__container p", {
  ...scrollRevealOption,
  delay: 500,
});

ScrollReveal().reveal(".header__container form", {
  ...scrollRevealOption,
  delay: 1000,
});

ScrollReveal().reveal(".header__container a", {
  ...scrollRevealOption,
  delay: 1500,
});

const swiper = new Swiper(".swiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
  },
});