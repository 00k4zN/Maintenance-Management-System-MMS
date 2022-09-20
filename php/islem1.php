<?php

require_once 'baglan.php';

if (isset($_POST['ekle'])) {
	
	

	$kaydet=$db->prepare("INSERT into yedekparca SET
		parcaID=:parcaID,
        parcaAd=:parcaAd,
		parcaSayisi=:parcaSayisi"
        );

	$insert=$kaydet->execute(array(
		'parcaID' => $_POST['parcaID'],
        'parcaAd' => $_POST['parcaAd'],
		'parcaSayisi' => $_POST['parcaSayisi']
	));


    if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:yedekparca.php?durum=ok");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:yedekparca.php?durum=no");
		exit;
	}
}

if (isset($_POST['update'])) {
		
    $parcaID=$_POST['parcaID'];



    $kaydet=$db->prepare("UPDATE yedekParca SET
    parcaID=:parcaID,
    parcaAd=:parcaAd,
    parcaSayisi=:parcaSayisi
    WHERE parcaID={$_POST['parcaID']}"
    
    );

    $insert=$kaydet->execute(array(
    'parcaID' => $_POST['parcaID'],
    'parcaAd' => $_POST['parcaAd'],
    'parcaSayisi' => $_POST['parcaSayisi']
));


if ($insert) {
    
    //echo "kayıt başarılı";

    Header("Location:duzenle.php?durum=ok&parcaID=$parcaID");
    exit;

} else {

    //echo "kayıt başarısız";
    Header("Location:duzenle.php?durumno&parcaID=$parcaID");
    exit;
}

}	

    if ($_GET['bilgiSiL']=="ok") {

            $sil=$db->prepare("DELETE from yedekparca where parcaID=:ID");
            $kontrol=$sil->execute(array(
                'ID' => $_GET['parcaID']
            ));

            if ($kontrol) {
                
                //echo "kayıt başarılı";

                Header("Location:yedekparca.php?durum=ok");
                exit;

            } else {

                //echo "kayıt başarısız";
                Header("Location:yedekparca.php?durum=no");
                exit;
            }


    }


    if (isset($_POST['ekle1'])) {
	
	

        $kaydet=$db->prepare("INSERT into makine SET
            makID=:makID,
            makAd=:makAd,
            makModel=:makModel,
            makKapasite=:makKapasite,
            markaID=:markaID,
            parcaID=:parcaID"
            );
    
        $insert=$kaydet->execute(array(
            'makID' => $_POST['makID'],
            'makAd' => $_POST['makAd'],
            'makModel' => $_POST['makModel'],
            'makKapasite' => $_POST['makKapasite'],
            'markaID' => $_POST['markaID'],
            'parcaID' => $_POST['parcaID']
        ));
    
    
        if ($insert) {
            
            //echo "kayıt başarılı";
    
            Header("Location:envanter.php?durum=ok");
            exit;
    
        } else {
    
            //echo "kayıt başarısız";
            Header("Location:envanter.php?durum=no");
            exit;
        }
    }
    
    if (isset($_POST['update1'])) {
            
        $makID=$_POST['makID'];
    
    
    
        $kaydet=$db->prepare("UPDATE makine SET
            makID=:makID,
            makAd=:makAd,
            makModel=:makModel,
            makKapasite=:makKapasite,
            markaID=:markaID,
            parcaID=:parcaID
            WHERE makID={$_POST['makID']}"
        
        );
    
        $insert=$kaydet->execute(array(
            'makID' => $_POST['makID'],
            'makAd' => $_POST['makAd'],
            'makModel' => $_POST['makModel'],
            'makKapasite' => $_POST['makKapasite'],
            'markaID' => $_POST['markaID'],
            'parcaID' => $_POST['parcaID']
    ));
    
    
    if ($insert) {
        
        //echo "kayıt başarılı";
    
        Header("Location:duzenle1.php?durum=ok&makID=$makID");
        exit;
    
    } else {
    
        //echo "kayıt başarısız";
        Header("Location:duzenle1.php?durumno&makID=$makID");
        exit;
    }
    
    }	
    
        if ($_GET['bilgiSiLL']=="ok") {
    
                $sil=$db->prepare("DELETE from makine where makID=:ID");
                $kontrol=$sil->execute(array(
                    'ID' => $_GET['makID']
                ));
    
                if ($kontrol) {
                    
                    //echo "kayıt başarılı";
    
                    Header("Location:envanter.php?durum=ok");
                    exit;
    
                } else {
    
                    //echo "kayıt başarısız";
                    Header("Location:envanter.php?durum=no");
                    exit;
                }
    
    
        }

?>