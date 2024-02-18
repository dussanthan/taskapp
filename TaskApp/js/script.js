
async function updateStatus(element) {

  const id = element.parentElement.parentElement.children[0].innerText;
  const dropdownvalue = element.value;
  console.log(id);
  const response = await fetch("./status.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      id: id,
      status: dropdownvalue,
    }),
  });
  //   const responseData = await response.json();
  if (!response.ok) {
    console.error("Error sending data:", response.statusText);
    // Handle error (e.g., display an error message)
  } else {
    console.log("Data sent successfully:", await response.text());
    //Alert
    const alert = document.getElementById("alert-container");
    const alertElement = document.createElement("div");
    alertElement.classList.add(
      "alert",
      "alert-primary",
      "alert-dismissible",
      "fade",
      "show"
    );
    alertElement.style.width = "fit-content";
    alertElement.style.position = "absolute";
    alertElement.style.right = "10px";
    alertElement.style.top = "10px";
    alertElement.innerText = "Updated!";
    setTimeout(() => {
      alert.removeChild(alertElement);
    }, 1500);
    alert.appendChild(alertElement);
    //End of the alert
  }
}
