<div class="col-12">
    
    <h5><?= $periode?></h5>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                            Reguler
                        </p>
                        <h5 class="font-weight-bolder mb-0">
                            <?= $reguler?> Peserta
                        </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div
                        class="icon icon-shape bg-gradient-info shadow text-center border-radius-md"
                        >
                        <i
                            class="ni ni-circle-08 text-lg opacity-10"
                            aria-hidden="true"
                        ></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                            Private Khusus
                        </p>
                        <h5 class="font-weight-bolder mb-0">
                            <?= $pk?> Kelas
                        </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div
                        class="icon icon-shape bg-gradient-success shadow text-center border-radius-md"
                        >
                        <i
                            class="ni ni-istanbul text-lg opacity-10"
                            aria-hidden="true"
                        ></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                            Private Luar
                        </p>
                        <h5 class="font-weight-bolder mb-0">
                            <?= $pl?> Kelas
                        </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div
                        class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"
                        >
                        <i
                            class="ni ni-bus-front-12 text-lg opacity-10"
                            aria-hidden="true"
                        ></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <p class="text-sm mb-0">
            <!-- deskripsi page  -->
            Rekap peserta TAR-Q
          </p>
        </div>
      </div>
    </div>
    <div class="card-body p-3 overflow-auto">
      <div class="row">
        <div class="card">
          <div class="">
            <table class="table table-hover align-items-center mb-0 text-dark" id="table-module">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Periode</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop w-1">Reguler</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop w-1">PV Khusus</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop w-1">PV Luar</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= footer()?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        showData();
    })

    // show data from database
    function showData() {
      $('#table-module').DataTable({
        initComplete: function () {
            var api = this.api();
            $("#mytable_filter input")
                .off(".DT")
                .on("input.DT", function () {
                    api.search(this.value).draw();
                });
        },
        oLanguage: {
            sProcessing: "loading...",
        },
        language: {
            paginate: {
                first: '<<',
                previous: '<',
                next: '>',
                last: '>>'
            }
        },
        processing: true,
        serverSide: true,
        ajax: { url: `<?= base_url()?>home/getDataHomeAkademik`, type: "POST" },
        columns: [
          {
              data: 'periode', // Assuming column_name corresponds to the field name
              searchable: true,
              className: 'text-sm', // You can adjust the classes as needed
              orderable: false,
          },
          {
              data: 'reguler', // Assuming column_name corresponds to the field name
              searchable: false,
              className: 'text-sm text-center', // You can adjust the classes as needed
              orderable: true,
          },
          {
              data: 'pv_khusus', // Assuming column_name corresponds to the field name
              searchable: false,
              className: 'text-sm text-center', // You can adjust the classes as needed
              orderable: true,
          },
          {
              data: 'pv_luar', // Assuming column_name corresponds to the field name
              searchable: false,
              className: 'text-sm text-center', // You can adjust the classes as needed
              orderable: true,
          }
        ],
        order: [],
        rowReorder: {
            selector: "td:nth-child(0)",
        },
        responsive: true,
        pageLength: 5,
        lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
        ]
      })
    }
</script>