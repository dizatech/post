$(document).ready(function(){
    //start delete post
    $('.delete_post_ajax').on('click',function (e) {
        e.preventDefault();

        let target = $(this);
        let post = $(this).data('post');
        // alert(post);
        Swal.fire({
            title: 'آیا برای حذف اطمینان دارید؟',
            icon: 'warning',
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger mx-2',
                cancelButton: 'btn btn-light mx-2'
            },
            buttonsStyling: false,
            confirmButtonText: 'حذف',
            cancelButtonText: 'لغو',
            showClass: {
                popup: 'animated fadeInDown'
            },
            hideClass: {
                popup: 'animated fadeOutUp'
            }
        })
            .then((result) => {
                if (result.isConfirmed){
                    Swal.fire({
                        title: 'در حال اجرای درخواست',
                        icon: 'info',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    $.ajax({
                        url: baseUrl + '/panel/post/delete_post_ajax/' + post,
                        type: 'delete' ,
                        dataType: 'json',
                        data: {
                            post : post
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                text: 'عملیات حذف با موفقیت انجام شد.',
                                confirmButtonText: 'تایید',
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                buttonsStyling: false,
                                showClass: {
                                    popup: 'animated fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animated fadeOutUp'
                                }
                            })
                                .then((response) => {
                                    target.closest('tr').remove();
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1500);

                                });
                        }

                    });
                }
            });

    });
    //end delete post

    //start delete postCategory
    $('.delete_post_category_ajax').on('click',function (e) {
        e.preventDefault();

        let target = $(this);
        let postCategory = $(this).data('post');
        Swal.fire({
            title: 'آیا برای حذف اطمینان دارید؟',
            icon: 'warning',
            showCancelButton: true,
            customClass: {
                confirmButton: 'btn btn-danger mx-2',
                cancelButton: 'btn btn-light mx-2'
            },
            buttonsStyling: false,
            confirmButtonText: 'حذف',
            cancelButtonText: 'لغو',
            showClass: {
                popup: 'animated fadeInDown'
            },
            hideClass: {
                popup: 'animated fadeOutUp'
            }
        })
            .then((result) => {
                if (result.isConfirmed){
                    Swal.fire({
                        title: 'در حال اجرای درخواست',
                        icon: 'info',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    $.ajax({
                        url: baseUrl + '/panel/post/delete_post_category_ajax/' + postCategory,
                        type: 'delete' ,
                        dataType: 'json',
                        data: {
                            post : postCategory
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                text: 'عملیات حذف با موفقیت انجام شد.',
                                confirmButtonText: 'تایید',
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                buttonsStyling: false,
                                showClass: {
                                    popup: 'animated fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animated fadeOutUp'
                                }
                            })
                                .then((response) => {
                                    target.closest('tr').remove();
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1500);

                                });
                        }

                    });
                }
            });

    });
    //end delete postCategory
});
