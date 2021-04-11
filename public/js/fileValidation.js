function fileValidation()
{
    $('#image-preview').remove();
    $('#file-name').removeClass('img-file-selected').html('');

    var input = $("#image");

    var file = input.prop("files")[0];
    var ext = file.name.split('.').pop();

    var validTypes = ["jpg", "jpeg", "png", "gif"];
    if(!validTypes.includes(ext))
    {
        alert("Invalid file type");
        input.val(null);
    }
    else
    {
        fr = new FileReader();
        fr.onload = function ()
        {
            var img = $('<img/>', {
                "id": "image-preview",
                "src": fr.result,
                "class": "img-form-preview",
                "alt": "preview"
            });
            $('#image-preview-container').append(img);

            $('#file-name').addClass('img-file-selected').html(file.name);
        }
        fr.readAsDataURL(file);
    }
}