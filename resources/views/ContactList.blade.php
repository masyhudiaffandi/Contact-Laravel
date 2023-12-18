<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
    <div class="apa">
        <form action="{{ route('Contact.search') }}" method="get">
            <input type="text" name="search" placeholder="Cari data..." value="{{ request('search') }}">
            <input type="submit" value="Cari">
        </form>
        <a href="{{ route('contact.create') }}"
           class="buat">Create
            Contact
        </a>
    </div>
    @if ($Contacts->isEmpty())
        <p>Data not found.</p>
        <a href="/">Back to home</a>
    @else
    <div class="contact-list-wrapper">
        <div class="contact-list">
            <table class="table" border="5">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor</th>
                    <th scope="col">Category</th>
                    <th scope="col">Controller</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Contacts as $Contact)
                    <tr>
                        <th scope="row">{{ $Contact->id }}</th>
                        <td>{{ $Contact->name }}</td>
                        <td>{{ $Contact->email }}</td>
                        <td>{{ $Contact->phone }}</td>
                        <td>{{ $Contact->category }}</td>
                        <td>
                            <a href="{{ route('contact.edit', $Contact->id) }}">Edit</a>
                            <form action="{{ route('contact.destroy', $Contact->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" name="delete" id="delete" value="delete">
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="control-center">
                <p>Halaman : {{ $Contacts->currentPage() }}</p>
                <p>Halaman : {{ $Contacts->Total() }}</p>
                <p>Halaman : {{ $Contacts->perPage() }}</p>
                {{ $Contacts->links() }}
              </div>
        </div>
    </div>
    @endif
</body>
</html>