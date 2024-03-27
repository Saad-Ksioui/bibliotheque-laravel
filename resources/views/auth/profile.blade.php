<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <title>Profile</title>
</head>

<body>
  <section class="vh-100" style="background-color: #9de2ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-md-9 col-lg-7 col-xl-5">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-4">
              <div class="d-flex text-black">
                <div class="flex-shrink-0">
                  <img
                    src="https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png"
                    alt="User Avatar" class="img-fluid" style="width: 180px; border-radius: 10px;">
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="mb-1">{{ $user->nom }} {{ $user->prenom }}</h5>
                  <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->username }}</p>
                  <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $user->email }}</p>
                  <div class="d-flex justify-content-start rounded-3 p-2 mb-2">
                    <div class="d-flex pt-1">
                      <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Modifier</button>
                      <a href="{{ route('logout') }}" class="btn btn-danger flex-grow-1">Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>

</html>
