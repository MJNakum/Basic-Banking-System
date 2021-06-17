<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/navbar.css" />

    <title>Basic Banking System</title>
  </head>

  <body>
    <header class="mb-auto">
      <?php
        include 'navbar.php';
        ?>
    </header>
    <main style="background-color: #e5ffec">
      <div class="container flex-center">
        <div class="row flex-center pt-5 mt-3">
          <div class="col-md-6 text-center text-md-left margins">
            <div class="heading text-center my-5">
              <h3>Welcome to</h3>
              <h1>THE BANK OF TSF</h1>
            </div>
            <br /><br /><br />
            <div class="column activity text-center">
              <div class="col-md act">
                <br />
                <table class="table table-borderless">
                  <td>
                    <tr>
                      <a href="transactionhistory.php"
                        ><button>Transaction History</button></a
                      >
                    </tr>
                    <tr>
                      <a href="transfermoney.php"
                        ><button>Make New Transaction</button></a
                      >
                    </tr>
                  </td>
                </table>
              </div>
            </div>
          </div>

          <div
            class="col-md-6 d-flex justify-content-center"
            data-wow-delay="0.3s"
          >
            <img src="bank3.png" alt="" class="img-responsive" />
          </div>
        </div>
      </div>
    </main>

    <br /><br /><br />
    <footer class="page-footer font-small">
      <div class="footer-copyright text-center py-3">
        © 2021 Copyright:
        <a href="#"> THE BANK OF TSF</a>
      </div>
      <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"
      ></script>
    </footer>
  </body>
</html>
