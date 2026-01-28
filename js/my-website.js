document.addEventListener('DOMContentLoaded', function () {
  // DOM-Ready, Initialisierung

  // TEIL 1: LOGIN-LOGIK
  // Dieser Teil steuert das Login-Formular.
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    const loginBox = document.getElementById('loginBox');
    const animationBox = document.getElementById('animationBox');
    const loginMessage = document.getElementById('loginMessage');
    const body = document.body;

    loginForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const formData = new FormData(loginForm);

      fetch('../php/login.php', {
        method: 'POST',
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            loginBox.style.display = 'none';
            body.style.backgroundImage = 'none';
            body.style.backgroundColor = '#580000';
            animationBox.style.display = 'block';
            setTimeout(() => {
              window.location.href = '../php/' + data.redirectUrl;
            }, 4000);
          } else {
            loginMessage.textContent = data.message;
            loginMessage.style.color = 'red';
          }
        })
        .catch((error) => {
          console.error('Fehler beim Login-Prozess:', error);
          loginMessage.textContent = 'Ein unerwarteter Fehler ist aufgetreten.';
          loginMessage.style.color = 'red';
        });
    });
  }

  // TEIL 2: BILD-MODAL-LOGIK
  // Dieser Teil steuert das Vergrößern der Bilder.
  const modal = document.getElementById('myModal');
  if (modal) {
    const modalImg = document.getElementById('modalImg');
    const captionText = document.getElementById('caption');
    const closeButton = document.querySelector('.modal-close');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');

    let activeGallery = [];
    let activeIndex = 0;

    const allTriggerImages = document.querySelectorAll('.modal-trigger');

    function updateModal() {
      modalImg.src = activeGallery[activeIndex].src;
      captionText.innerHTML = '';

      prevButton.style.display = activeIndex === 0 ? 'none' : 'block';
      nextButton.style.display =
        activeIndex === activeGallery.length - 1 ? 'none' : 'block';
    }

    allTriggerImages.forEach((img) => {
      img.addEventListener('click', function () {
        // 1) PRIORITÄT: Fahrzeugseiten mit vehicle-page (American Cars, andere Produkte)
        let productContainer = this.closest('.vehicle-page');

        // 2) Wenn KEIN vehicle-page → Karten-galerie auf index.php
        if (!productContainer) {
          productContainer = this.closest('.home-cars');
        }

        // 3) Galerie: nur Bilder aus dem jeweiligen Container
        if (productContainer) {
          activeGallery = Array.from(
            productContainer.querySelectorAll('.modal-trigger')
          );
        } else {
          activeGallery = [this]; // Fallback (Einzelbilder)
        }

        // 4) Index des geklickten Bildes ermitteln
        activeIndex = activeGallery.findIndex((g) => g.src === this.src);
        if (activeIndex === -1) activeIndex = 0;

        // 5) Modal anzeigen
        modal.classList.add('show');
        updateModal();
      });
    });

    function closeModal() {
      modal.classList.remove('show');
    }

    closeButton.addEventListener('click', closeModal);

    prevButton.addEventListener('click', () => {
      if (activeIndex > 0) {
        activeIndex--;
        updateModal();
      }
    });

    nextButton.addEventListener('click', () => {
      if (activeIndex < activeGallery.length - 1) {
        activeIndex++;
        updateModal();
      }
    });

    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        closeModal();
      }
    });
  }

  // TEIL 3: LOGIK FÜR PRODUKT-TABS
  // Dieser Teil steuert "Beschreibung" und "Technische Daten".
  const allVehiclePages = document.querySelectorAll('.vehicle-page');

  allVehiclePages.forEach((vehiclePage) => {
    const tabLinks = vehiclePage.querySelectorAll('.tab-link');
    const tabContents = vehiclePage.querySelectorAll('.tab-content');

    tabLinks.forEach((link) => {
      link.addEventListener('click', () => {
        const tabName = link.getAttribute('data-tab');

        tabLinks.forEach((item) => item.classList.remove('active'));
        tabContents.forEach((content) => content.classList.remove('active'));

        link.classList.add('active');
        const activeContent = vehiclePage.querySelector(
          `.tab-content[data-tab-content="${tabName}"]`
        );

        if (activeContent) {
          activeContent.classList.add('active');
        }
      });
    });
  });
});
