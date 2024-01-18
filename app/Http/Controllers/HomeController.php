<script>
        // Mengambil nilai invoiceId dari sessionStorage
        var invoiceId = sessionStorage.getItem('invoiceId');
        // Mengambil nilai grossAmount dari sessionStorage
        var grossAmount = sessionStorage.getItem('gross_amount');
        // Mengambil nilai expiryTime dari sessionStorage
        var expiryTime = sessionStorage.getItem('expiry_time');

        // Menghilangkan tanda kutip ganda dari invoiceId jika ada
        invoiceId = invoiceId ? invoiceId.replace(/"/g, '') : '';
        // Menghilangkan tanda kutip ganda dari grossAmount jika ada
        grossAmount = grossAmount ? grossAmount.replace(/"/g, '') : '';
        // Menghilangkan tanda kutip ganda dari expiryTime jika ada
        expiryTime = expiryTime ? expiryTime.replace(/"/g, '') : '';
        // Mengubah format grossAmount menjadi mata uang Rupiah jika ada
        grossAmount = grossAmount ? formatCurrency(grossAmount) : '';
        // Mengubah format expiryTime menjadi format waktu yang sesuai jika ada
        expiryTime = expiryTime ? formatExpiryTime(expiryTime) : '';

        // Menetapkan nilai invoiceId ke dalam elemen dengan id 'invoiceId'
        document.getElementById('invoiceId').textContent = invoiceId;
        // Menetapkan nilai grossAmount ke dalam elemen dengan id 'nominal'
        document.getElementById('nominal').textContent = grossAmount;
        // Menetapkan nilai expiryTime ke dalam elemen dengan id 'dueDate'
        document.getElementById('dueDate').textContent = expiryTime;

        // Fungsi untuk mengubah format nilai menjadi mata uang Rupiah
        function formatCurrency(value) {
            return 'Rp ' + parseFloat(value).toLocaleString('id-ID');
        }

        // Fungsi untuk mengubah format waktu menjadi format yang sesuai
        function formatExpiryTime(dateString) {
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };
            var formattedDate = new Date(dateString.replace(' ', 'T')).toLocaleDateString('id-ID', options);
            return formattedDate;
        }
    </script>