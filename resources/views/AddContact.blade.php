<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Tambahkan Kontak</h1>
    </header>
    <div class="tambah" style="padding: 2vw">
        <section id="Add">
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="Name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="name" placeholder="John Doe">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-sm-2 col-form-label">Nomor</label>
                    <div class="col-sm-10">
                      <input type="number" name="phone" class="form-control" id="phone" placeholder="+62 xxx-xxx-xxxx">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="Category" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="category" id="category">
                            <option selected>Company/Home</option>
                            <option value="Company">Company</option>
                            <option value="Home">Home</option>
                        </select>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="submit"></input>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-primary">Batal</a>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.j"></script>
</body>
</html>