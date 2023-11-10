const table = document.querySelector('.table')
const btn = document.querySelector(".add-new");
btn.addEventListener("click", () => {
  const row = `<form action="post">  
  <div class="row">
      <div class="col"><input type="text" name="name" required></div>
      <div class="col"><input type="text" name="name" required></div>
      <div class="col"> <input type="text" name="name" required></div>
      <div class="col"><input type="text" name="name" required></div>
      </div>
      </form>`
          table.innerHTML += row;
          })
