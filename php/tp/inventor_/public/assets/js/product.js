document.addEventListener("DOMContentLoaded", () => {
    buildOptionsSelectCategories();
});

const buildOptionsSelectCategories = async () => {
    const selCategories = document.getElementById("category");
    try {
        const response = await fetch(selCategories.dataset.urlListCategories);

        if (response.status != 200) {
            throw new Error("Failed to fetch list categories");
        }
        //uploads/ID_PRODUCT/test.png

        const categories = await response.json();

        categories.data.forEach((category) => {
            const option = document.createElement("option");
            option.value = category.id;
            option.textContent = category.name;

            selCategories.appendChild(option);
        });

    } catch (error) {
        console.error("Error while loading categories: " + error);
    }
}