const formAddStudent = document.getElementById("form-add-student");

formAddStudent.addEventListener("submit", (event) => this.handleSubmit(event));

async function handleSubmit(event) {
  event.preventDefault();

  const url = formAddStudent.action;
  const method = formAddStudent.method || "POST";

  const formData = new FormData(formAddStudent);

  try {
    const responseData = await fetch(url,{
        method: method,
        body:formData
    });

    if(responseData.ok){
        window.location.href = "/samples";
    }
  } catch (error) {
    console.error(error);
  }
}
