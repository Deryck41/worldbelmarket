<? include "templates/header.php";
$directory = __DIR__ . '/../../../asted_themes/';
?>
<section class="container">
    <h1>Редактирование шаблона</h1>

    <?php
    // Обработка отправленной формы
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $template = $_POST['template'];
        $file = $_POST['file'];
        $content = $_POST['contentheme'];

        // Логика сохранения шаблона в выбранном файле
        // Ваш код сохранения шаблона

        // Пример сохранения шаблона в файл
        $templatePath = $directory . $template . '/' . $file;
        file_put_contents($templatePath, $content);

        echo '<p>Шаблон сохранен!</p>';
    }
    ?>

<form action="" method="post">
    <div class="form-group">
        <label for="template">Выберите шаблон:</label>
        <select name="template" id="template" class="form-control">
        <option value="null">Выберите шаблон</option>
            <?php
            // Получение списка шаблонов
            $templatesPath = $directory;
            $templates = array_diff(scandir($templatesPath), array('..', '.', '.DS_Store', 'Thumbs.db', 'desktop.ini', '.git', '.svn', '.idea', 'node_modules'));
            foreach ($templates as $template) {
                echo '<option value="' . $template . '">' . $template . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="file">Выберите файл для редактирования:</label>
        <select name="file" id="file" class="form-control">
        </select>
    </div>

    <div class="form-group">
        <label for="contenttheme">Содержимое файла:</label><br>
        <textarea name="contentheme" id="contentheme" rows="10" cols="50" class="form-control"></textarea>
    </div>

    <input type="submit" value="Сохранить" class="btn btn-primary">
</form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      // Получаем ссылку на текстовое поле
        $(document).ready(function() {
            // Обработка изменения выбранного шаблона
            $('#template').on('change', function() {
                var template = $(this).val();
                loadFiles(template);
            });

            // Обработка изменения выбранного файла
            $('#file').on('change', function() {
                var template = $('#template').val();
                var file = $(this).val();
                loadContent(template, file);
            });

            // Загрузка списка файлов для выбранного шаблона
            function loadFiles(template) {
                $.ajax({
                    url: '/asted/components/asted.site/theme_get_files.php', // Файл для получения списка файлов
                    type: 'POST',
                    data: { template: template },
                    dataType: 'json',
                    success: function(response) {
                        var fileSelect = $('#file');
                        fileSelect.empty();

                        // Добавление файлов в список
                        $.each(response, function(index, file) {
                            fileSelect.append($('<option></option>').attr('value', file).text(file));
                        });

                        // Загрузка содержимого выбранного файла
                        var selectedFile = fileSelect.val();
                        if (selectedFile) {
                            loadContent(template, selectedFile);
                        }
                    },
                    error: function() {
                        alert('Произошла ошибка при загрузке файлов.');
                    }
                });
            }

            // Загрузка содержимого выбранного файла
            function loadContent(template, file) {
                $.ajax({
                    url: '/asted/components/asted.site/theme_get_template_content.php', // Файл для получения содержимого файла
                    type: 'POST',
                    data: { template: template, file: file },
                    dataType: 'text',
                    success: function(responses) {
                      $('#contentheme').val(responses);
                    },
                    error: function() {
                        alert('Произошла ошибка при загрузке содержимого файла.');
                    }
                });
            }
        });
    </script>
</section>
 <? include "templates/footer.php"; ?>