$(document).ready(function (){
    $("a.list-item-delete").on("click",function (e){
        e.preventDefault()
        let url = $(this).attr("href")
            if (url !== null) {
                let confirmation = confirm("Bu Kaydı Silmek İstediğinize Emin Misiniz?");
                if (confirmation){
                    axios.delete(url).then(result=>{
                        console.log(result.data)
                        $("#" + result.data.id).remove()
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            }
        })
    })
