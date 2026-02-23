const gallery = document.getElementById('gallery');

function loadImage(url) {
    return new Promise((resolve, reject) => {
        const img = document.createElement('img');
        img.src = url;
        img.width="300";
        img.onload = () => resolve(img);
        img.onerror = () => reject(new Error(`Erreur : ${url}`));
    });
}

async function displayGallery(urls) {
    for (const url of urls) {
        try {
            const imgElement = await loadImage(url);
            gallery.appendChild(imgElement);
        } catch (err) {
            const errorPlaceholder = document.createElement('p');
            errorPlaceholder.textContent = err.message;
            gallery.appendChild(errorPlaceholder);
        }
    }
}

const req = new XMLHttpRequest();
req.open("GET", "https://potterapi-fedeperin.vercel.app/");
req.onload = function (){
    if(req.status === 200) {
        const result = JSON.parse(req.response);
        document.getElementById("message").innerHTML = result.message;
        document.getElementById("repo").innerHTML = result.repo;
    }
}
req.send();

const urls = ['../../../public/Light CV.jpg', '../../../public/profil.jpg', '../../../public/vite.svg'];

displayGallery(urls);