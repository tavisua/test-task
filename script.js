const submit_btn = document.getElementById("submit");
const data_table = document.getElementById("data");

submit_btn.onclick = function (e) {
  e.preventDefault();
  data_table.style.display = "block";
  
  let selectUser = document.getElementById('user');
  let userId = selectUser.value;
  let selectedText = selectUser.options[selectUser.selectedIndex].innerText;
  
  document.getElementById('user_name').innerText = selectedText;
  
  
  fetch("data.php?user=" + userId)
      .then(response => response.json())
      .then(data => {
        let tableBody = document.getElementById("balance");
        tableBody.innerHTML='';
        data.forEach(balance => {
          let row = document.createElement("tr");
          row.innerHTML = `<td>${balance.month}</td><td>${balance.balance}</td>`;
          tableBody.appendChild(row);
        });
      })
      .catch(error => console.error("Error:", error));
};
