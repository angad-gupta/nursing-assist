
<html><h1>Charge $1 with Simplify Commerce</h1>
<form id="simplify-payment-form" action="" method="POST">
    <!-- The $10 amount is set on the server side -->
    <div>
        <label>Credit Card Number: </label>
        <input id="cc-number" type="text" maxlength="20" autocomplete="off" value="" autofocus />
    </div>
    <div>
        <label>CVC: </label>
        <input id="cc-cvc" type="text" maxlength="4" autocomplete="off" value=""/>
    </div>
    <div>
        <label>Expiry Date: </label>
        <select id="cc-exp-month">
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">Jun</option>
            <option value="07">Jul</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
        </select>
        <select id="cc-exp-year">
            <option value="15">2015</option>
            <option value="16">2016</option>
            <option value="17">2017</option>
            <option value="18">2018</option>
            <option value="19">2019</option>
            <option value="20">2020</option>
            <option value="21">2021</option>
            <option value="22">2022</option>
            <option value="23">2023</option>
            <option value="24">2024</option>
        </select>
    </div>
    <button id="process-payment-btn" type="submit">Process Payment</button>
</form>


<div class="alert alert-success" role="alert" id="simplify-success" style="display:none">
    Payment was processed successfully.
</div>
<iframe name="secure3d-frame" id="secure3d-frame" style="display:none"></iframe>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function createInput(name, value) {
    var input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', name);
    input.setAttribute('value', value);
    return input;
  }
 
    function createSecure3dForm(data) {
      //var secure3dData = data['3dsecure'];
      var secure3dData = data.card.secure3DData;
      var secure3dForm = document.createElement('form');
      secure3dForm.setAttribute('method', 'POST');
      secure3dForm.setAttribute('action', secure3dData.acsUrl); 
      secure3dForm.setAttribute('target', 'secure3d-frame');
 
      var merchantDetails = secure3dData.md;
      var paReq = secure3dData.paReq;
      var termUrl = secure3dData.termUrl;
 
      secure3dForm.append(createInput('PaReq', paReq)); 
      secure3dForm.append(createInput('TermUrl', termUrl)); 
      secure3dForm.append(createInput('MD', merchantDetails)); 
 
      return secure3dForm;
    }
 
    function processPayment() {
      var payload = {
        cc_number: $('#cc-number').val(),
        cc_exp_month: $('#cc-exp-month').val(),
        cc_exp_year: $('#cc-exp-year').val(),
        cc_cvc: $('#cc-cvc').val(),
        currency: $('#currency').val(),
        amount: $('#amount').val(),
        _token: '{{csrf_token()}}'
      };
 
      $.post('{{route("enrolment.3ds.pay")}}', payload, function (res) {  
        var response = JSON.parse(res);
      /*   var token = response.token;
        var currency = response.currency; */
        var token = response.id;
        var currency ='AUD';

        if (response.card.secure3DData.isEnrolled) { // Step 1
        //if(1) {
          var secure3dForm = createSecure3dForm(response); // Step 2
          var iframeNode = $('#secure3d-frame');
 
          $(secure3dForm).insertAfter(iframeNode);
          iframeNode.show();
          //iframeNode.css('display', '');
 
          var process3dSecureCallback = function (threeDsResponse) {
            console.log('Processing 3D Secure callback...');
            var three_data = JSON.parse(threeDsResponse.data);
            window.removeEventListener('message', process3dSecureCallback);
            var simplifyDomain = 'https://www.simplify.com'; console.log(threeDsResponse.origin)
            // Step 4 
             if (threeDsResponse.origin === simplifyDomain
              && three_data.secure3d.authenticated) {
              //if(1) {
              var completePayload = {
                amount: 100,
                currency: currency,
                description: 'test payment',
                token: token,
                _token: '{{csrf_token()}}'
              };
 
              $.post('{{route("enrolment.3ds.complete")}}', completePayload, function (completeResponse) { console.log(completeResponse);
                if (completeResponse.success) {
                  $('#simplify-payment-form').hide();
                  $('#simplify-success').show();
                  //$('#simplify-success').css('display', '');
                }
                iframeNode.hide();
              });
            } else {
               var err_res = JSON.parse(threeDsResponse.data);
               alert(err_res.secure3d.error.message);
            }
          };
 
          iframeNode.on('load', function () {
            window.addEventListener('message', process3dSecureCallback); // Step 3
          });
 
          secure3dForm.submit();
        }
      });
    }
 
    $(document).ready(function () {
      $('#simplify-payment-form').on('submit', function () {
        processPayment();
        return false;
      });
    });
</script>
</html>