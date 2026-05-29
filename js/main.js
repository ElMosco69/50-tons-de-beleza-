
/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$("#delete-modal").on("show.bs.modal", function (event) {
  
    var button = $(event.relatedTarget);
    var id = button.data("customer");

    var modal = $(this);
    modal.find(".modal-title").text("Excluir Cliente: " + id);
    modal.find(".modal-body").text("Deseja mesmo excluir o cliente " + id + "?");
    modal.find("#confirm").attr("href", "delete.php?id=" + id);
});

// Back-to-top: smooth scroll when clicking footer link
$(function(){
    $(document).on('click', '.back-to-top', function(e){
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 400);
    });
});