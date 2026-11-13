/* Initial Catalog Data */
const catalogProducts = [
  { id: 101, ref: "REF-401", name: 'Écran 27" 4K UHD IPS', priceHT: 299.99 },
  {
    id: 102,
    ref: "REF-202",
    name: "Souris Ergonomique Sans Fil",
    priceHT: 39.5,
  },
  {
    id: 103,
    ref: "REF-809",
    name: "Câble HDMI 2.1 Ultra HD 2m",
    priceHT: 14.9,
  },
  {
    id: 104,
    ref: "REF-104",
    name: "Support Ordinateur Aluminium",
    priceHT: 34.0,
  },
  { id: 105, ref: "REF-550", name: "Clavier Mécanique RGB Pro", priceHT: 89.9 },
  {
    id: 106,
    ref: "REF-732",
    name: "Casque Audio Bluetooth ANC",
    priceHT: 119.0,
  },
  { id: 107, ref: "REF-915", name: "Hub USB-C 7-en-1 HDMI/SD", priceHT: 42.0 },
];

/* Initial Cart Data (pre-populated to match high fidelity sample) */
let cart = [
  {
    id: 101,
    ref: "REF-401",
    name: 'Écran 27" 4K UHD IPS',
    priceHT: 299.99,
    qty: 1,
  },
  {
    id: 102,
    ref: "REF-202",
    name: "Souris Ergonomique Sans Fil",
    priceHT: 39.5,
    qty: 2,
  },
  {
    id: 104,
    ref: "REF-104",
    name: "Support Ordinateur Aluminium",
    priceHT: 34.0,
    qty: 1,
  },
];

const TVA_RATE = 0.2; // 20%
let discountPercent = 5; // 5% default
let selectedPayment = "CB";

// Format utility for Euro currency
function formatEUR(val) {
  return new Intl.NumberFormat("fr-FR", {
    style: "currency",
    currency: "EUR",
  }).format(val);
}

function renderCatalog(filterText = "") {
  const tbody = document.getElementById("catalog-table-body");
  tbody.innerHTML = "";

  const query = filterText.toLowerCase().trim();
  const filtered = catalogProducts.filter(
    (item) =>
      item.ref.toLowerCase().includes(query) ||
      item.name.toLowerCase().includes(query),
  );

  if (filtered.length === 0) {
    tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Aucun produit ne correspond à votre recherche.</td></tr>`;
    return;
  }

  filtered.forEach((product) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
          <td><span class="product-code">${product.ref}</span></td>
          <td class="product-name-cell">${product.name}</td>
          <td style="text-align: right; font-weight: 500;">${formatEUR(product.priceHT)}</td>
          <td style="text-align: center;">
            <button 
              type="button" 
              class="action-icon-btn btn-add-item" 
              title="Ajouter au panier" 
              onclick="addToCart(${product.id})"
            >
              <!-- Blue check or plus icon directly inspired by image -->
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"/>
                <path d="M12 5v14"/>
              </svg>
            </button>
          </td>
        `;
    tbody.appendChild(tr);
  });
}

function renderCart(filterText = "") {
  const tbody = document.getElementById("cart-table-body");
  tbody.innerHTML = "";

  const query = filterText.toLowerCase().trim();
  const filtered = cart.filter(
    (item) =>
      item.ref.toLowerCase().includes(query) ||
      item.name.toLowerCase().includes(query),
  );

  if (cart.length === 0) {
    tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Le panier est actuellement vide.</td></tr>`;
  } else if (filtered.length === 0) {
    tbody.innerHTML = `<tr><td colspan="4" class="empty-state">Aucun article trouvé dans le panier.</td></tr>`;
  } else {
    filtered.forEach((item) => {
      const lineTotalTTC = item.priceHT * (1 + TVA_RATE) * item.qty;
      const tr = document.createElement("tr");
      tr.innerHTML = `
            <td>
              <div class="product-name-cell">${item.name}</div>
              <div style="font-size: 0.75rem; color: var(--text-light);">${item.ref} · ${formatEUR(item.priceHT * (1 + TVA_RATE))} TTC</div>
            </td>
            <td style="text-align: center;">
              <div class="qty-controls">
                <button type="button" class="qty-btn" onclick="updateQty(${item.id}, -1)">-</button>
                <span class="qty-value">${item.qty}</span>
                <button type="button" class="qty-btn" onclick="updateQty(${item.id}, 1)">+</button>
              </div>
            </td>
            <td style="text-align: right; font-weight: 600;">${formatEUR(lineTotalTTC)}</td>
            <td style="text-align: center;">
              <button 
                type="button" 
                class="action-icon-btn btn-remove-item" 
                title="Supprimer la ligne" 
                onclick="removeFromCart(${item.id})"
              >
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="18" y1="6" x2="6" y2="18"/>
                  <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
              </button>
            </td>
          `;
      tbody.appendChild(tr);
    });
  }

  updateTotals();
}

function updateTotals() {
  let totalQty = 0;
  let totalHT = 0;

  cart.forEach((item) => {
    totalQty += item.qty;
    totalHT += item.priceHT * item.qty;
  });

  const totalTVA = totalHT * TVA_RATE;
  const totalBrutTTC = totalHT + totalTVA;
  const discountAmount = totalBrutTTC * (discountPercent / 100);
  const netPayable = Math.max(0, totalBrutTTC - discountAmount);

  // Top Stat Cards
  document.getElementById("stat-total-items").textContent = totalQty;
  document.getElementById("stat-total-brut").textContent =
    formatEUR(totalBrutTTC);
  document.getElementById("stat-net-payable").textContent =
    formatEUR(netPayable);

  // Summary Breakdown Card
  document.getElementById("summary-ht").textContent = formatEUR(totalHT);
  document.getElementById("summary-tva").textContent = formatEUR(totalTVA);
  document.getElementById("summary-discount-amount").textContent =
    discountAmount > 0 ? `-${formatEUR(discountAmount)}` : `0,00 €`;
  document.getElementById("summary-net-payable").textContent =
    formatEUR(netPayable);
}

/* Cart Modification Actions */
function addToCart(productId) {
  const prod = catalogProducts.find((p) => p.id === productId);
  if (!prod) return;

  const existing = cart.find((item) => item.id === productId);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ ...prod, qty: 1 });
  }

  renderCart(document.getElementById("cart-filter-input").value);
}

function updateQty(productId, delta) {
  const item = cart.find((i) => i.id === productId);
  if (!item) return;

  item.qty += delta;
  if (item.qty <= 0) {
    removeFromCart(productId);
  } else {
    renderCart(document.getElementById("cart-filter-input").value);
  }
}

function removeFromCart(productId) {
  cart = cart.filter((item) => item.id !== productId);
  renderCart(document.getElementById("cart-filter-input").value);
}

function resetCart() {
  if (confirm("Voulez-vous réinitialiser le ticket en cours ?")) {
    cart = [];
    // Generate new ticket reference
    document.getElementById("ticket-number").textContent =
      "#POS-" + Math.floor(1000 + Math.random() * 9000);
    renderCart();
  }
}

/* Top Quick Add Handler */
function handleDirectAdd() {
  const query = document
    .getElementById("direct-search-input")
    .value.trim()
    .toLowerCase();
  if (!query) return;

  const match = catalogProducts.find(
    (p) =>
      p.ref.toLowerCase() === query || p.name.toLowerCase().includes(query),
  );

  if (match) {
    addToCart(match.id);
    document.getElementById("direct-search-input").value = "";
  } else {
    alert(
      "Aucun article correspondant à : " +
        query +
        ". Consultez la liste du catalogue ci-dessous.",
    );
  }
}

/* Payment Method Toggle */
function setPaymentMethod(buttonEl, method) {
  document
    .querySelectorAll(".btn-method")
    .forEach((btn) => btn.classList.remove("active"));
  buttonEl.classList.add("active");
  selectedPayment = method;
}

/* Print Invoice Action */
function printInvoice() {
  if (cart.length === 0) {
    alert(
      "Le panier est vide. Veuillez ajouter des articles avant d'encaisser.",
    );
    return;
  }

  const now = new Date();
  document.getElementById("print-date-time").textContent =
    `Date: ${now.toLocaleDateString("fr-FR")} ${now.toLocaleTimeString("fr-FR")} | Paiement: ${selectedPayment}`;

  window.print();
}

/* Event Listeners Initialization */
document.addEventListener("DOMContentLoaded", () => {
  renderCatalog();
  renderCart();

  // Realtime catalog search
  document
    .getElementById("catalog-filter-input")
    .addEventListener("input", (e) => {
      renderCatalog(e.target.value);
    });

  // Realtime cart search
  document
    .getElementById("cart-filter-input")
    .addEventListener("input", (e) => {
      renderCart(e.target.value);
    });

  // Discount % modification
  document
    .getElementById("discount-percent-input")
    .addEventListener("input", (e) => {
      let val = parseFloat(e.target.value);
      if (isNaN(val) || val < 0) val = 0;
      if (val > 100) val = 100;
      discountPercent = val;
      updateTotals();
    });
});
