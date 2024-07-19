@include('component.headerHome')

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        @include('component.sidebarHome')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>CDP Panel Box - Monitoring</h3>
            </div>
            <div class="page-content">

                @yield('page-content')
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <!-- <div class="col-lg-8 mt-4 mb-4">
                                <h5 class="text-center">Sensor</h5>
                                <button id="toggle-relay" class="btn btn-primary form-control">Aktifkan Relay</button>
                            </div> -->

                            <div class="col-lg-12">
                                <h5>Monitoring</h5>
                            </div>
                            <!-- <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i style="margin-top: -25px; margin-right:10px;" class="bi bi-plug-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Relay</h6>
                                                <h6 id="relay-status" class="font-extrabold mb-0 text-danger">OFF</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i style="margin-top: -25px; margin-right:10px;" class="bi bi-lightning-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Status Listrik</h6>
                                                <h6 id="sensor-status" class="font-extrabold mb-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i style="margin-top: -25px; margin-right:10px;" class="bi bi-server"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">MQTT Status</h6>
                                                <h6 id="mqtt-status" class="font-extrabold mb-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                const clientId = Math.random().toString(16).substr(2, 8);
                                const host = 'wss://sysypheantech.cloud.shiftr.io:443';

                                const options = {
                                    keepalive: 30,
                                    clientId: clientId,
                                    username: "sysypheantech",
                                    password: "iMbpfEWeGWoPIpJe",
                                    protocolId: 'MQTT',
                                    protocolVersion: 4,
                                    clean: true,
                                    reconnectPeriod: 1000,
                                    connectTimeout: 30 * 1000,
                                };

                                console.log("Menghubungkan ke Broker");

                                $('#mqtt-status').text('LOADING...')

                                $('#sensor-status').text('WATING...')

                                const client = mqtt.connect(host, options);

                                client.on("connect", () => {
                                    console.log("Terhubung");

                                    $('#mqtt-status').text('TERHUBUNG').addClass('text-success')

                                    client.subscribe("sensor/status/#", {
                                        qos: 1
                                    });
                                });

                                setTimeout(() => {
                                    client.on("message", function(topic, payload) {
                                        if (topic === "sensor/status/relay") {
                                            if (payload == "1") {
                                                $('#sensor-status').text('NYALA').addClass('text-success').removeClass('text-danger');
                                            } else {
                                                $('#sensor-status').text('MATI').addClass('text-danger').removeClass('text-success');
                                            }
                                        }
                                    });
                                }, 2000);

                            })
                        </script>
                    </div>
                </section>
                @include('component.footerHome')
            </div>
        </div>
    </div>
</body>