import axios from 'axios';
import './bootstrap';

import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

const signoutBtn = document.getElementById("signout_btn")
signoutBtn.addEventListener("click", async () => {
  const response = await axios.post("/signout");

  console.log(response);
});
