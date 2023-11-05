function strongPass() 
{
  Swal.fire({
      icon: 'error',
      title: 'ERROR',
      html:  `PASSWORD MUST ATLEAST<br>
                      MININUM OF 8 AND MAXIMUM OF 15 CHARACTERS<br>
                      ATLEAST 1 NUMBER<br>
                      ATLEAST 1 UPPERCASE LETTER<br>
                      ATLEAST 1 LOWERCASE LETTER<br>
                      ATLEAST 1 SYMBOL`,
        focusConfirm: false,
        confirmButtonText:`OKAY`
      })
}

function oldPass() 
{
  Swal.fire({
            icon: 'error',
            title: 'ERROR',
            html:  `YOU ENTER OLD PASSWORD`,
      focusConfirm: false,
      confirmButtonText:`OKAY`
    })
}

function NewConfirm() 
{
  Swal.fire({
            icon: 'error',
            title: 'ERROR',
            html:  `NEW PASSWORD AND CONFIRM PASSWORD NOT EQUAL`,
      focusConfirm: false,
      confirmButtonText:`OKAY`
    })
}

function SuccessPass() 
{
    Swal.fire({
        icon: 'success',
        title: 'SUCCESS',
        html:  `SUCCESSFULLY CHANGE PASSWORD`,
        focusConfirm: false,
        confirmButtonText:`OKAY`
    }).then(function() {
            window.location=document.referrer;
        })
}

function errorPass() 
{
            Swal.fire({
                icon: 'error',
                title: 'ERROR',
                html:  `DATABASE ERROR`,
          focusConfirm: false,
          confirmButtonText:`OKAY`
        }).then(function() {
                    window.history.back();
            })
}

function oldInvalid() 
{
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            html:  `OLD PASSWORD INVALID`,
      focusConfirm: false,
      confirmButtonText:`OKAY`
    })
}
//---------------------------------------------------------------

//MPIN 
function oldPin() 
{
  Swal.fire({
            icon: 'error',
            title: 'ERROR',
            html:  `YOU ENTER OLD PASSWORD`,
      focusConfirm: false,
      confirmButtonText:`OKAY`
    })
}

//MPIN 
function newConfirmMpin() 
{
  Swal.fire({
            icon: 'error',
            title: 'ERROR',
            html:  'NEW 4 PIN AND CONFIRM 4 PIN<br>NOT MATCH',
      focusConfirm: false,
      confirmButtonText:`OKAY`
    })
}

function SuccessMpin() 
{
    Swal.fire({
        icon: 'success',
        title: 'SUCCESS',
        html:  `SUCCESSFULLY CHANGE MPIN`,
        focusConfirm: false,
        confirmButtonText:`OKAY`
    }).then(function() {
            window.location=document.referrer;
        })
}

function failedMpin() 
{
      Swal.fire({
          icon: 'error',
          title: 'ERROR',
          html:  `FAILED TO UPDATE 4 PIN SECURITY`,
    focusConfirm: false,
    confirmButtonText:`OKAY`
  }).then(function() {
              window.history.back();
      })
}

function old4pinInvalid() 
{
      Swal.fire({
          icon: 'error',
          title: 'ERROR',
          html:  `OLD 4PIN SECURITY INVALID`,
    focusConfirm: false,
    confirmButtonText:`OKAY`
  }).then(function() {
              window.history.back();
      })
}