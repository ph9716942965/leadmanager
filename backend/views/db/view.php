<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Db */
?>
<div class="db-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email', //<b class="glyphicon glyphicon-envelope"></b> 
            //'whatsapp',
            [ 'format' => 'html', 'label' => '<b class="fa fa-whatsapp"></b> Whatsapp','value'=>function ($data){
               $return ='';
               $return .="<a href='https://wa.me/$data->whatsapp'><i class='fa fa-whatsapp'></i><i>$data->whatsapp</i>";
                return  $return;
            }
            ],

            'phone', //<b class="fa-phone-square"></b> 
            'address', //<b class="fa fa-home"></b> 

            [ 'format' => 'html', 'label' => '<b class="fa fa-calendar-times-o"></b> Next Appointment','value'=>function ($data){
                $nextCall=$callTrack=\backend\models\Appointment::find()
                ->where(['db_id' => $data->id])
                ->select(['appointment_date_time','create_at'])
                ->orderby(['id'=>'desc'])
                ->asArray()
                ->one(); 
                return $nextCall["appointment_date_time"];
            }
            ],

            [ 'format' => 'html', 'label' => 'call history','value'=>function ($data){ 
                $callTrack=\backend\models\CallLog::find()
                ->where(['db_id' => $data->id])
                ->select(['review','create_at'])->asArray()
                ->all(); 
                $return='<table class="table table-bordered track_tbl"><thead>
                <tr>
                    <th></th>
                    <th>S No</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            </thead>';
                $sn=0;
                foreach($callTrack as $ct){
                    $sn++;
                    $return.='<tr class="active">
                        <td class="track_dot"><span class="track_line"></span></td>
                            <td>'.$sn.'</td>
                            <td>Call By Agent 1</td>
                            <td>'.substr($ct["review"], 0, 30).'</td>
                            <td>'.$ct["create_at"].'</td>
                        </tr>';
                }
                return '</table>'.$return;
                //->one()['review'];
               // echo "hii";exit;
                //return '<h3>'.print_r($ar[0]).'</h3>';
            }  
            ],
           // 'appointment.appointment_date_time',
           // 'create_at',
        ],
    ]) ?>

</div>
