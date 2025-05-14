document.addEventListener("DOMContentLoaded", function () {
    const galeria = document.getElementById("galeria");
    const imagenes = [
        "assets/img/portfolio1.jpg",
        "assets/img/portfolio2.jpg",
        "assets/img/portfolio3.jpg",
        "assets/img/portfolio4.jpg",
        "assets/img/portfolio5.jpg",
        "assets/img/portfolio6.jpg"
    ];

    imagenes.forEach(ruta => {
        const div = document.createElement("div");
        div.className = "col-md-4 mb-4";
        div.innerHTML = `
            <div class="card">
                <img src="${ruta}" class="card-img-top" alt="Trabajo realizado">
            </div>
        `;
        galeria.appendChild(div);
    });
});
