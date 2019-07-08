<script>
    function insertParam(key, value) {
        key = encodeURI(key);
        value = encodeURI(value);
        var kvp = document.location.search.substr(1).split('&');
        var i = kvp.length;
        var x;
        while (i--) {
            x = kvp[i].split('=');
            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }
        if (i < 0) {
            kvp[kvp.length] = [key, value].join('=');
        }
        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
$(document).on('click', '.delete-blog', function () {
    var basePath = window.location.origin;
    var btn = $(this);
    var id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                },
                url: `${basePath}/blog/${id}`,
                type: 'DELETE',
                dataType: 'json',
                success: function (data) {
                    if (data.result === true) {
                        btn.parent().parent().parent().remove();
                        var endPage = $('#end-page');
                        var totalBlog = $('#total-blog');
                        if (endPage.text() == 1) {
                            $('#start-page').text(0);
                        }
                        endPage.text(endPage.text() - 1);
                        totalBlog.text(totalBlog.text() - 1);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            });
        }
    })
});
$(document).on('click', '#filter-category', function () {
    var id = $('input[name=category]:checked').val();
    if(id === undefined){
        Swal.fire(
            'Ooopss!',
            'Please select a category.',
            'error'
        )
    }else{
        insertParam('cat', id);
    }
});
$(document).on('click','.card-category', function(){
    var id = $(this).data('id');
    if(id === undefined){
        Swal.fire(
            'Ooopss!',
            'Please select a category.',
            'error'
        )
    }else{
        insertParam('cat', id);
    }
});
</script>
