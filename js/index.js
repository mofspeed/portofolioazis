document.addEventListener("DOMContentLoaded", () => {
  const projectList = document.getElementById("projectList");

  const projects = [
    { title: "Website Pemerintahan", description: "Sistem informasi dengan CRUD dan PHP." },
    { title: "Toko Online Sederhana", description: "Menampilkan produk dan keranjang belanja." }
  ];

  projects.forEach(project => {
    const col = document.createElement("div");
    col.className = "col-md-6 mb-4";
    col.innerHTML = `
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">${project.title}</h5>
          <p class="card-text">${project.description}</p>
        </div>
      </div>
    `;
    projectList.appendChild(col);
  });
});


// main-navbar

// window.addEventListener('scroll', function () {
//   const navbar = document.getElementById('main-navbar');
//   if (window.scrollY > 50) {
//     navbar.classList.add('scrolled');
//   } else {
//     navbar.classList.remove('scrolled');
//   }
// });

window.addEventListener('scroll', function () {
  const navbarNav = document.getElementById('navbarNav');
  if (window.scrollY > 50) {
    navbarNav.classList.add('navbar-colored');
    navbarNav.classList.remove('navbar-transparent');
  } else {
    navbarNav.classList.add('navbar-transparent');
    navbarNav.classList.remove('navbar-colored');
  }
});

