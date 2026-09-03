let bill = {
  data: null,
  productDetails: [],
};

document.addEventListener("DOMContentLoaded", () => {
  const formBill = document.getElementById("form-create-bill");
  const formAddProduct = document.getElementById("form-add-product");

  document.getElementById("btn-save-bill").addEventListener("click", () => {
    formBill.requestSubmit();
  });

  formBill.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(formBill);

    bill.data = Object.fromEntries(formData);
    createJsonFile();
  });

  formAddProduct.addEventListener("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(formAddProduct);

    const data = Object.fromEntries(formData);

    bill.productDetails.push(data);
console.log(bill);

    createRowTable(data);
  });

  document.getElementById("reset-form").addEventListener("click", () => {
    formBill.reset();
    formAddProduct.reset();
    let billTableDetailsBody = document.querySelector(
      "#tbl-bill-details tbody",
    );
    bill = {
      data: null,
      productDetails: [],
    };
    updateTotalPriceProduct();
    billTableDetailsBody.innerHTML = "";
  });
});

function createRowTable(data) {
  let billTableDetailsBody = document.querySelector("#tbl-bill-details tbody");
  let tr = document.createElement("tr");
  let tdProductName = document.createElement("td");
  tdProductName.textContent = data.product_name;
  tr.appendChild(tdProductName);

  let tdProductQuantity = document.createElement("td");
  tdProductQuantity.textContent = data.product_quantity;
  tr.appendChild(tdProductQuantity);

  let tdProductUnitPrice = document.createElement("td");
  tdProductUnitPrice.textContent = data.product_unit_price;
  tr.appendChild(tdProductUnitPrice);

  let tdProductTotal = document.createElement("td");
  tdProductTotal.textContent = data.product_quantity * data.product_unit_price;
  tr.appendChild(tdProductTotal);

  billTableDetailsBody.appendChild(tr);

  updateTotalPriceProduct();
}

function updateTotalPriceProduct() {
  const tdTotalPriceProduct = document.getElementById("id-total");
  tdTotalPriceProduct.innerHTML = bill.productDetails.reduce(
    (accumulator, row) =>
      accumulator + row.product_quantity * row.product_unit_price,
    0,
  );
}

function createJsonFile() {
  const jsonStringBill = JSON.stringify(bill);

  //En JavaScript, un Blob (pour Binary Large Object) est un objet qui représente des données brutes et immuables sous forme de fichier.
  const blob = new Blob([jsonStringBill], { type: "application/json" });

  //creer url pour le blob
  const url = URL.createObjectURL(blob);

  const linkDownload = document.createElement("a");
  linkDownload.href = url;
  linkDownload.download = "bill.json";

  document.body.appendChild(linkDownload);
  linkDownload.click();
  document.body.removeChild(linkDownload);

  // Libérer l'URL
  URL.revokeObjectURL(url);
}

function resetBillForm() {}
