
jQuery(document).ready(function () {
  tableClear();
  jQuery('#calculateBtn').click(function (e) {
    if (checkOnEmpty()){
      return;
    }
    var expression = jQuery('#inputField').val();

    $.ajax({
      url:'/calculator/ajax',
      data:{expression:expression},
      type: 'POST',
      success: function (data) {
        console.log(data);
        //window.location.href = "/calculator/result";
        clearInput();
        setResultState('Success');
        tableClear();
        setResult(data);
      },
      error: function () {
        setResultState('Error');
        tableClear();
      }
    });
  });

  jQuery('.info-btn').click(function (e) {
    setResultState('');
    console.log(e.currentTarget);
    let target = e.currentTarget;
    let targetId = jQuery(target).attr('id');
    console.log(targetId);

    $.ajax({
      url:'/calculator/operations',
      data:{operation:targetId},
      type: 'POST',
      success: function (data) {
        let transactions = jQuery.parseJSON(data);
        tableClear();
        setTable(transactions);


      },
      error: function () {
        tableClear();
        setResultState('Error!!');
      }
    });
  });

});


function setResultState(state){
  $('#result').text(state);
}

function setResult (result) {
  $('#result').text('Result '+result);
};

function setTable(transactions){
  let table = jQuery('#tableoperations');
  let bodyTable = jQuery(table).find('tbody');
  for (var i=0;i<transactions.length;i++){

    let row = jQuery('<tr>');
    let cellExrpession = jQuery('<td>',{
      text:transactions[i].expression,
    });
    let cellResult = jQuery('<td>',{
      text:transactions[i].result,
    });
    row.append(cellExrpession);
    row.append(cellResult);
    bodyTable.append(row);
  }
  console.log(transactions);
}
function tableClear () {
  let table = jQuery('#tableoperations');
  let bodyTable = jQuery(table).find('tbody');
  bodyTable.empty();
}
function clearInput(){
  jQuery('#inputField').val('');
}
function checkOnEmpty(){
  if(jQuery('#inputField').val() === '' || jQuery('#inputField').val().indexOf(' ') >= 0){
    return true;
  }
  return false;
}