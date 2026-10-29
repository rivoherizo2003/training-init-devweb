import Modal from "./components/Modal.js";
import { showFormErrors } from "./helpers/Common.js";
let currentPage = 1;
let totalPages = 0;

document.addEventListener("DOMContentLoaded", () => {
  const formAddProduct = document.getElementById("form-add-product");
  const btnPrevious = document.getElementById("btn-previous");
  const btnNext = document.getElementById("btn-next");

  btnPrevious.addEventListener("click", () => {
    currentPage = currentPage - 1;
    if (currentPage === 0) {
      currentPage = 1;
      return;
    }

    getListProducts(currentPage);
  });

  btnNext.addEventListener("click", () => {
    currentPage = currentPage + 1;
    if (currentPage > totalPages) {
      currentPage = totalPages;
      return;
    }

    getListProducts(currentPage);
  });

  formAddProduct.addEventListener("submit", async (event) => {
    event.preventDefault();
    const form = event.target;
    const urlAddProduct = form.action;
    const formData = new FormData(form);

    try {
      const response = await fetch(urlAddProduct, {
        method: "POST",
        body: formData,
      });

      if (response.status !== 201) {
        showFormErrors(await response.json(), form);
        throw new Error("Error saving new product" + response.status);
      }

      const addProductResponse = await response.json();

      const activeOverlay = document.querySelector(
        ".modal-overlay.modal-overlay--active",
      );
      if (activeOverlay) {
        activeOverlay.click();
      }
      form.reset();
      //implement TOAST here to display success message
    } catch (error) {
      console.log("Error submitting form; " + error);
      //toast error
    }
  });

  initUploadFileEvent();
  buildOptionSelectCategories();
  getListProducts(1);
});

const initUploadFileEvent = () => {
  const hrfUploadButton = document.getElementById("hrf-upload-file");
  const inputFileUpload = document.getElementById("file-product");
  const imagePreview = document.getElementById("img-preview");
  hrfUploadButton.addEventListener("click", () => {
    inputFileUpload.click();
  });

  inputFileUpload.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
      if (file.type.startsWith("image/")) {
        const imageUrl = URL.createObjectURL(file);
        console.log(imageUrl);
        imagePreview.src = imageUrl;
        imagePreview.classList.remove("d-none");

        //on libére la mémoire une fois chargée
        imagePreview.onload = () => {
          URL.revokeObjectURL(imagePreview.src);
        };
      } else {
        inputFileUpload.value = "";
      }
    } else {
      imagePreview.src = "";
      imagePreview.classList.add("d-none");
    }
  });
};

const buildOptionSelectCategories = async () => {
  const selCategories = document.getElementById("category");
  try {
    const response = await fetch(selCategories.dataset.urlListCategories);
    if (response.status != 200) {
      throw new Error("Failed to fetch list categories");
    }

    const categoriesJsonPromise = await response.json();
    categoriesJsonPromise.data.forEach((category) => {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.name;

      selCategories.appendChild(option);
    });
  } catch (error) {
    console.error("Error while loading categories: " + error);
  }
};

const showEditPage = async (urlEditFormProduct) => {
  try {
    const response = await fetch(urlEditFormProduct);

    if (!response.ok) {
      throw new Error("Failed to fetch a product");
    }

    const modalBody = document.querySelector(
      "#edit-product-modal .modal__body",
    );
    modalBody.innerHTML = await response.text();
    initUploadFileEvent();
  } catch (error) {
    console.error(error);
  }
};

const getListProducts = async (page) => {
  const tableProducts = document.getElementById("table-products");
  const tbody = document.querySelector("#table-products tbody");
  const spnCurrentPage = document.querySelector("#spn-current-page");
  const spnTotalPages = document.querySelector("#spn-total-pages");
  try {
    const paginate = { page: page, itemsPerPage: 4 };
    const params = new URLSearchParams(paginate).toString();
    const response = await fetch(
      `${tableProducts.dataset.urlListProducts}?${params}`,
      {
        method: "GET",
      },
    );
    if (response.status != 200) {
      throw new Error("Failed to fetch list products");
    }
    const products = await response.json();
    spnCurrentPage.innerHTML = products.meta.page;
    spnTotalPages.innerHTML = products.meta.totalPages;
    totalPages = products.meta.totalPages;
    buildTableProducts(tbody, products);

    new Modal("confirm-delete-product-modal");
    new Modal("edit-product-modal");
  } catch (error) {
    console.error("Error while loading products: " + error);
  }
};

const buildTableProducts = (tbody, products) => {
  tbody.innerHTML = "";
  products.data.forEach((product) => {
    const tr = document.createElement("tr");
    const tdProductName = document.createElement("td");
    tdProductName.textContent = product.productName;
    tr.appendChild(tdProductName);

    const tdBuyingPrice = document.createElement("td");
    tdBuyingPrice.textContent = product.buyingPrice;
    tr.appendChild(tdBuyingPrice);

    const tdQuantity = document.createElement("td");
    tdQuantity.textContent = product.quantity;
    tr.appendChild(tdQuantity);

    const tdThresholdValue = document.createElement("td");
    tdThresholdValue.textContent = product.thresholdvalue;
    tr.appendChild(tdThresholdValue);

    const tdExpiryDate = document.createElement("td");
    tdExpiryDate.textContent = product.expiryDate;
    tr.appendChild(tdExpiryDate);

    const tdAvailability = document.createElement("td");
    tdAvailability.textContent = product.availability;
    tr.appendChild(tdAvailability);

    const hrfEdit = document.createElement("a");
    hrfEdit.textContent = "Edit";
    hrfEdit.href = "#";
    hrfEdit.classList.add("text-success", "p-5", "edit-product");
    hrfEdit.dataset.modalTarget = "edit-product-modal";
    hrfEdit.dataset.urlShowProductEdit = product.urlShowProductEdit;

    const hrfDelete = document.createElement("a");
    hrfDelete.textContent = "Delete";
    hrfDelete.href = "#";
    hrfDelete.classList.add("text-light-red", "p-5");
    hrfDelete.dataset.modalTarget = "confirm-delete-product-modal";
    hrfDelete.dataset.urlConfirm = product.urlDelete;

    const tdActions = document.createElement("td");
    tdActions.appendChild(hrfEdit);
    tdActions.append(hrfDelete);
    tr.appendChild(tdActions);

    tbody.appendChild(tr);
  });

  initEventEditProductBtn();
};

const initEventEditProductBtn = () => {
  document.querySelectorAll(".edit-product").forEach((editBtn) => {
    editBtn.addEventListener("click", () => {
      showEditPage(editBtn.dataset.urlShowProductEdit);
    });
  });
};
