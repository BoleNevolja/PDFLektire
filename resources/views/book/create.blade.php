<form method="POST" action="/store/book" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="ime" required></input><br>
    <input type="text" name="author" placeholder="autor" required></input><br>
    <input type="text" name="short" placeholder="sazetak" required></input><br>
    <textarea rows="4" cols="50" type="text" name="desc" placeholder="opis knjige" required></textarea><br>
    <input type="text" name="textbook" placeholder="1 = lektira" required></input><br>
    <input type="file" name="book" placeholder="autor" required></input><br>
    <input type="file" name="thumbnail" placeholder="autor" required></input><br>
    <input type="hidden" value="1" name="test">

    <button type="submit">Postavi</button>
  </form>