        <!-- Modal logout -->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Apakah Anda yakin akan logout dari sistem?</p>                    
                        <p>Tekan 'Ya' untuk keluar dan 'Tidak' untuk batal.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?= base_url('sysadminlogin/logout')?>" class="btn btn-danger btn-lg">Ya</a>
                            <button class="btn btn-default btn-lg mb-control-close">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>