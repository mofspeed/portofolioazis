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