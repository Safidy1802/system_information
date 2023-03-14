<section id="testimonial">
        <div class="container">

            <div class="row">
                <?php for ($i=0; $i < sizeof($objets) ; $i++) { ?>
                    <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
                        <div class="card card-span h-100">
                            <div class="position-relative"> <img class="img-fluid rounded-3 w-100" src="<?php echo base_url('assets/img/object/').'/'.$this->Modelbdd->idobjettophoto($objets[$i]['idobjet']); ?>" alt="..." />
                                <div class="card-img-overlay ps-0">
                                    <span class="badge bg-danger p-2 ms-3"><?php echo $objets[$i]['prix']." AR"; ?></span><span class="badge bg-primary ms-2 me-1 p-2">
                                    <i class="fas fa-clock me-1 fs-0"></i><span class="fs-0">Fast</span></span>
                                </div>
                            </div>
                            <div class="card-body px-0">
                            <h5 class="fw-bold text-1000 text-truncate"><?php echo $objets[$i]['nom']; ?></h5><span class="badge bg-soft-danger py-2 px-3"><span class="fs-1 text-danger">
                                <a href="<?php echo site_url('fonction/verifidprofil/'.$objets[$i]['username'] );?>">
                                <?php echo $objets[$i]['username']; ?></a></span></span>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>

        </div>
</section>
