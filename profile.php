<!DOCTYPE html>
<html>
  <head>
    <title>User Profile Page</title>
    <style>
      /* CSS styling */
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
      }
      header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
      }
      h1 {
        margin: 0;
      }
      img {
        max-width: 100%;
        height: auto;
      }
      section {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
      }
      h2 {
        margin-top: 0;
      }
      ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }
      li {
        margin-bottom: 10px;
      }
      label {
        font-weight: bold;
      }
      .button {
        display: inline-block;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
      }
      .button:hover {
        background-color: #666;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>User Profile Page</h1>
    </header>
    <section>
      <img src="https://via.placeholder.com/150" alt="User Profile Picture">
      <h2>John Doe</h2>
      <ul>
        <li>
          <label>Email:</label> john.doe@email.com
        </li>
        <li>
          <label>Phone:</label> 555-555-5555
        </li>
        <li>
          <label>Address:</label> 123 Main St, Anytown USA
        </li>
      </ul>
      <a href="#" class="button">Edit Profile</a>
    </section>
  </body>
</html>
