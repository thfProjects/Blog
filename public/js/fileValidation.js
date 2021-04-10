function fileValidation()
{
    var input = $("#image");

    var file = input.prop("files")[0];
    var ext = file.name.split('.').pop();

    var validTypes = ["jpg", "jpeg", "png", "gif"];
    if(!validTypes.includes(ext))
    {
        alert("Invalid file type");
        input.val(null);
    }
}