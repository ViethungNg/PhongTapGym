<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i>Trang Chủ</a>
  <ul>
    <li class="<?php if($page=='trangchu'){ echo 'active'; }?>"><a href="../admin/index.php"><i class="fas fa-tachometer-alt"></i> <span>Trang Chủ</span></a> </li>
    <li class="submenu"> <a href="#"><i class="fas fa-users"></i> <span>Quản lý khách hàng</span> <span class="label label-important"><?php include '../khachhang/slkhachhang.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='khachhang'){ echo 'active'; }?>"><a href="../khachhang/index.php"><i class="fas fa-arrow-right"></i>Danh sách khách hàng</a></li>
        <li class="<?php if($page=='khachhang-them'){ echo 'active'; }?>"><a href="../khachhang/themkhachhang.php"><i class="fas fa-arrow-right"></i>Đăng ký khách hàng</a></li>
        <li class="<?php if($page=='thaydoi'){ echo 'active'; }?>"><a href="../khachhang/dieuchinhthaydoi.php"><i class="fas fa-arrow-right"></i>Xem sự thay đổi</a></li>        
        <li class="<?php if($page=='khachhang-capnhat'){ echo 'active'; }?>"><a href="../khachhang/capnhatkh.php"><i class="fas fa-arrow-right"></i>khách hàng hết hạn</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Quản lý thiết bị</span> <span class="label label-important"><?php include '../thietbi/slthietbi.php';?> </span></a>
    <ul>
        <li class="<?php if($page=='thietbi'){ echo 'active'; }?>"><a href="../thietbi/index.php"><i class="fas fa-arrow-right"></i>Danh sách thiết bị</a></li>
        <li class="<?php if($page=='themthietbi'){ echo 'active'; }?>"><a href="../thietbi/them.php"><i class="fas fa-arrow-right"></i>Thêm thiết bị</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Quản lý dịch vụ</span> <span class="label label-important"><?php include '../dichvu/sldichvu.php';?> </span></a>
    <ul>
        <li class="<?php if($page=='dichvu'){ echo 'active'; }?>"><a href="../dichvu/index.php"><i class="fas fa-arrow-right"></i>Danh sách dịch vụ</a></li>
        <li class="<?php if($page=='themdichvu'){ echo 'active'; }?>"><a href="../dichvu/them.php"><i class="fas fa-arrow-right"></i>Thêm dịch vụ</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='diemdanh'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="fas fa-calendar-alt"></i> <span>Quản lý điểm danh</span></a>
      <ul>
        <li class="<?php if($page=='diemdanh'){ echo 'active'; }?>"><a href="../diemdanh/index.php"><i class="fas fa-arrow-right"></i>Danh sách điểm danh</a></li>
                <li class="<?php if($page=='diemdanhngay'){ echo 'active'; }?>"><a href="../diemdanh/diemdanhngay.php"><i class="fas fa-arrow-right"></i>Danh sách điểm danh hôm nay</a></li>
          <li class="<?php if($page=='xemdiemdanh'){ echo 'active'; }?>"><a href="../diemdanh/xem.php"><i class="fas fa-arrow-right"></i> Thống kê điểm danh</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="fas fa-hand-holding-usd"></i> <span>Quản lý hóa đơn</span> <span class="label label-important"><?php include '../hoadon/sl-hoadon.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='hoadon'){ echo 'active'; }?>"><a href="../hoadon/index.php"><i class="fas fa-arrow-right"></i>Danh sách hóa đơn</a></li>
          <li class="<?php if($page=='xemhoadon'){ echo 'active'; }?>"><a href="../hoadon/xem.php"><i class="fas fa-arrow-right"></i>Xem khách hàng đã thanh toán</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Quản lý thông báo</span> <span class="label label-important"><?php include '../thongbao/sl-thongbao.php';?> </span></a>
      <ul>
          <li class="<?php if($page=='thongbao'){ echo 'active'; }?>"><a href="../thongbao/index.php"><i class="fas fa-arrow-right"></i>Danh sách thông báo</a></li>
          <li class="<?php if($page=='themthongbao'){ echo 'active'; }?>"><a href="../thongbao/them.php"><i class="fas fa-arrow-right"></i>Thêm thông báo mới</a></li>
        </ul>
    </li>
        <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Quản lý nhân viên</span> <span class="label label-important"><?php include '../nhanvien/slnhanvien.php';?> </span></a>
          <ul>
            <li class="<?php if($page=='nhanvien'){ echo 'active'; }?>"><a href="../nhanvien/index.php"><i class="fas fa-arrow-right"></i>Danh sách nhân viên</a></li>
            <li class="<?php if($page=='luong'){ echo 'active'; }?>"><a href="../nhanvien/luong.php"><i class="fas fa-arrow-right"></i>Chi tiết lương nhân viên</a></li>
            <li class="<?php if($page=='themnhanvien'){ echo 'active'; }?>"><a href="../nhanvien/them.php"><i class="fas fa-arrow-right"></i>Thêm nhân viên mới</a></li>
          </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>Quản lý công việc</span> <span class="label label-important"></span></a>
          <ul>
            <li class="<?php if($page=='congviec'){ echo 'active'; }?>"><a href="../congviec/index.php"><i class="fas fa-arrow-right"></i>Danh sách công việc</a></li>
            <li class="<?php if($page=='themcongviec'){ echo 'active'; }?>"><a href="../congviec/them.php"><i class="fas fa-arrow-right"></i>Thêm công việc mới</a></li>
          </ul>
        </li>

        <li class="<?php if($page=='thongke'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="fas fa-calendar-alt"></i> <span>Quản lý thống kê</span></a>
          <ul>
            <li class="<?php if($page=='thongkekh'){ echo 'active'; }?>"><a href="../thongke/khachhang.php"><i class="fas fa-arrow-right"></i>Thống kê khách hàng đăng ký</a></li>
            <li class="<?php if($page=='thongkedt'){ echo 'active'; }?>"><a href="../thongke/doanhthu.php"><i class="fas fa-arrow-right"></i>Thống kê Doanh thu</a></li>
            <li class="<?php if($page=='thongkett'){ echo 'active'; }?>"><a href="../thongke/theothang.php"><i class="fas fa-arrow-right"></i>Thống kê lãi</a></li>
          </ul>
        </li>
  </ul>
</div>