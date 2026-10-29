const btnRefresh = document.getElementById("btn-refresh-list-students");
const tbodyListStudents = document.getElementById("tbody-list-students");

async function getListStudents() {
  const url = "http://localhost:8000/samples/list_students.php";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error("Retrieving list students failed!");
    }
    const listStudents = await response.text();
    tbodyListStudents.innerHTML = listStudents;
  } catch (error) {
    console.error(error);
  }
}

btnRefresh.addEventListener("click", getListStudents);

const deleteButtons = document.querySelectorAll(".btn-delete");

deleteButtons.forEach((button) => {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    const row = this.closest("tr");

    // Supprime proprement l'élément du DOM
    row.remove();

    //supprimer en base avec fetch (A faire)
  });
});
