document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById('myModalVZ');
    var modaledit = document.getElementById('myModalEdit');
    var closeBtnEdit = document.getElementById('closeModalEdit');
    var gerenciarEdit = document.getElementById('editBolsa');
    var openBtn = document.getElementById('VerBolsa');
    var closeBtn = document.getElementById('closeModal');

    var modaldelete = document.getElementById('myModalDelete');
    var closeBtnDelete = document.getElementById('closeModalDelete');
    var gerenciarDelete = document.getElementById('deleteBolsa');

    var modalcreate = document.getElementById('myModalCreate');
    var closeBtnCreate = document.getElementById('closeModalCreate');
    var gerenciarCreate = document.getElementById('CreateBolsa');

    //modal criar
    gerenciarCreate.onclick = function () {
        modalcreate.style.display = 'block';
    }
    closeBtnCreate.onclick = function () {
        modalcreate.style.display = 'none';
    }


    // Criação:

    // modal editar
    gerenciarEdit.onclick = function () {
        modaledit.style.display = 'block';
    }
    closeBtnEdit.onclick = function () {
        modaledit.style.display = 'none';
    }



    // modal deletar
    gerenciarDelete.onclick = function () {
        modaldelete.style.display = 'block';
    }
    closeBtnDelete.onclick = function () {
        modaldelete.style.display = 'none';
    }




    openBtn.onclick = function () {
        modal.style.display = 'block';
    }

    closeBtn.onclick = function () {
        modal.style.display = 'none';
    }



});