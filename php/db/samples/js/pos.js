let bill = {
  data: {},
  products: [],
};

document.addEventListener("DOMContentLoaded", () => {
  const formSearchProducts = document.getElementById("form-search-product");
  formSearchProducts.addEventListener("submit", (event) => {
    event.preventDefault();
    searchProducts(formSearchProducts);
  });
});

async function searchProducts(form) {
  const formData = new FormData(form);
  const params = new URLSearchParams(formData).toString();
  const url = `${form.action}?${params}`;
  const tbodyListProducts = document.querySelector("#tbl-list-products tbody");
  const response = await fetch(url);
  if (!response.ok) {
    throw new Error("Error calling " + url);
  }

  const result = await response.text();
  tbodyListProducts.innerHTML = result;
}
