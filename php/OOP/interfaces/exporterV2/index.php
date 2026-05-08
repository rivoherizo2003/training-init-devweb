<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="exporter-container">
            <h2 class="title-form">Formulaire d'export</h2>
            <form action="export_handler.php" method="post">
                <div class="form-row">
                    <label for="txt-filename">Filename:</label>
                    <input type="tel" class="form-control" name="filename" id="txt-filename" value="filetest" id="">
                </div>

                <div class="form-row">
                    <label for="txt-file-content">File content:</label>
                    <textarea name="file-content" id="txt-file-content" class="form-control custom-scrollbar" rows="10">Hello,
Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt cumque odio repellendus a libero quod, dignissimos placeat fuga quibusdam illo voluptas odit sed aliquam sapiente ab eaque facilis consequuntur quo saepe quia ad necessitatibus! Enim perspiciatis quibusdam nesciunt! Minima enim repudiandae maxime labore nesciunt, laboriosam architecto mollitia accusamus ut nisi.

Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate illo soluta consequuntur doloremque impedit minus iure laboriosam fuga. Blanditiis mollitia, corrupti itaque voluptatem dicta nesciunt alias? Fuga non debitis a?
            </textarea>
                </div>

                <div class="form-row">
                    <div class="form-check">
                        <input type="radio" name="type-file" checked value="pdf" id="pdf-radio">
                        <label for="pdf-radio">*.pdf</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="type-file" value="csv" id="csv-radio">
                        <label for="csv-radio">*.csv</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="type-file" value="txt" id="txt-radio">
                        <label for="txt-radio">*.txt</label>
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" class="btn btn-primary">Export</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>