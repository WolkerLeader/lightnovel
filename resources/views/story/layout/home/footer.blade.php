<script>
    $(document).ready(function() {

        $(".mobile-toggle header").click(function() {
            $(this).parent().find(".listall_summary").toggle();
            $(this).parent().find(".sect-body").toggle();
        });

        //listab(".daily-recent_views");

    });
</script>
{{-- <script src="js/truyen.js"></script> --}}
<script>
    // Toggle lớp "none" khi bấm vào nút mục lục
    document.querySelector('.catalog-icon').addEventListener('click', function() {
        var listVolSection = document.getElementById('list-vol');
        listVolSection.classList.toggle('none');
    });

    // Cuộn màn hình đến tập truyện khi bấm vào mục lục
    document.querySelectorAll('.list-volume li').forEach(function(item) {
        item.addEventListener('click', function() {
            var targetId = this.getAttribute('data-scrollTo');
            var targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    // Ẩn mục lục khi bấm vào nút "list-vol_off"
    document.querySelector('.list-vol_off').addEventListener('click', function() {
        var listVolSection = document.getElementById('list-vol');
        listVolSection.classList.add('none');
    });

    // Ẩn mục lục khi bấm ra ngoài mục lục
    document.addEventListener('click', function(event) {
        var listVolSection = document.getElementById('list-vol');
        var isClickInside = listVolSection.contains(event.target) || document.querySelector('.catalog-icon').contains(event.target);
        if (!isClickInside) {
            listVolSection.classList.add('none');
        }
    });
</script>

</main>

<script src="{{ asset('js/app.js')}}"></script>

<footer id="footer">
    <div class="container">
        <!--<span><a href="">Hako.re</a></span>-->
        <span class="right">Liên hệ: <a href="mailto:daoducphong2004@gmail.com" target="_blank" style="color: #5fff46">daoducphong2004@gmail.com</a></span>

        <span>© 2016 - 2024 Cổng Light Novel - Đọc Light Novel</span>
    </div>
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 0) { // Tìm kiếm từ 2 ký tự trở lên
                $.ajax({
                    url: "{{ route('search_re') }}",
                    type: "GET",
                    data: {
                        'title': query
                    },
                    success: function(data) {
                        $('#search-results').html(data).show();
                    },
                    error: function() {
                        console.error("Có lỗi xảy ra với AJAX.");
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        // Ngăn gửi form mặc định nếu không có kết quả được chọn


        // Ẩn kết quả khi nhấp ra ngoài
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search').length) {
                $('#search-results').hide();
            }
        });

        // Điền giá trị từ dropdown vào ô tìm kiếm khi nhấp
        $(document).on('click', '#search-results p', function() {
            $('#search').val($(this).text());
            $('#search-results').hide();
        });
    });
    console.log("URL:", "{{ route('search_re') }}");
</script>
</body>

</html>
