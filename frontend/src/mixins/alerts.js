import Swal from 'sweetalert2'
export default {
  methods: {
		displayToast: function(status,message) {
			const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });
      Toast.fire({
        icon: status,
        title: message
      })
    },
    showLoading() {
      Swal.fire({
        title: 'Saving Changes',
        text: 'Please wait while we contact the server.',
      })
      Swal.showLoading();
    }
	}
}