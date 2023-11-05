		function success() 
		{
		          Swal.fire({
		          icon: 'success',
		          title: 'SUCCESS',
		          html:  `SUCCESSFULLY INSERTED`,
		   	 		focusConfirm: false,
		    		confirmButtonText:`OKAY`
		  			}).then(function() {
			window.location=document.referrer;
		          })

		}

		function failed() 
		{
			    Swal.fire({
			    icon: 'error',
			    title: 'ERROR',
			    html:  'FAILED TO INSERT',
					focusConfirm: false,
					confirmButtonText:`OKAY`
				}).then(function() {								
					window.history.back();
			    })
		}

		function successUpdate() 
		{
		          Swal.fire({
		          icon: 'success',
		          title: 'SUCCESS',
		          html:  `SUCCESSFULLY UPDATED`,
		   	 		focusConfirm: false,
		    		confirmButtonText:`OKAY`
		  			}).then(function() {
			window.location=document.referrer;
		          })

		}

		function failedUpdate() 
		{
			    Swal.fire({
			    icon: 'error',
			    title: 'ERROR',
			    html:  'FAILED TO UPDATE',
					focusConfirm: false,
					confirmButtonText:`OKAY`
				}).then(function() {								
					window.history.back();
			    })
		}

		function successDelete() 
		{
		          Swal.fire({
		          icon: 'success',
		          title: 'SUCCESS',
		          html:  `SUCCESSFULLY DELETE`,
		   	 		focusConfirm: false,
		    		confirmButtonText:`OKAY`
		  			}).then(function() {
			window.location=document.referrer;
		          })

		}

		function failedDelete() 
		{
			    Swal.fire({
			    icon: 'error',
			    title: 'ERROR',
			    html:  'FAILED TO DELETE',
					focusConfirm: false,
					confirmButtonText:`OKAY`
				}).then(function() {								
					window.history.back();
			    })
		}



