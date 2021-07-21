<?php
include "include/session.php";
include "include/config.php";

if(isset($_GET["oid"])&&isset($_GET["rid"])){
    $ourid=$_GET["oid"];
    $remoteid=$_GET["rid"];
   
}
?>    
    
    <?php
    if($_SESSION["seeker"]){
        
      $sql=$conn->prepare("SELECT r.r_name,s.s_name FROM st_details AS s,rc_details AS r WHERE s.s_id=? AND r.r_id=?");
      $sql->bindParam(1,$ourid);
       $sql->bindParam(2,$remoteid);
       $sql->execute();
       $row=$sql->fetch(PDO::FETCH_ASSOC);
      
     
    ?> 
    <div class="">
        <div>
            <h1 class="title text-center">Welcome to Qualifind Live Meet</h1>
            <div class="inline">
                <input class="text-center ft id" value="" id="show-peer" disabled/>
                <div class="text-center copy">copy it manually and send to seeker</div>
            </div>
            
               
                          
            </div>

        <div class="container-fluid">

            <div class="row">
                
                <div class="col-sm-6 mt-3 mb-3 " >
                    <div class="card main" style="background: transparent;">
                        <div class="card-body cb">
                            <h5 class="card-title"><?php echo $row["s_name"] ?></h5>
                            
                            <div id="ourVideo"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3 mb-3 ">
                    <div class="card  main" style="background: transparent;">
                        <div class="card-body  cb">
                            <h5 class="card-title"><?php echo $row["r_name"] ?></h5>
                            
                            <div id="remoteVideo"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="inline">
            <h3 class="text-center" id="">Find Your Qualifind</h3>
        </div>
    </div>
    <div class="meetfooter">
    <div class="row">
        <div class="col text-center">
            <input class="bottominput ft" id="peerID" placeholder="peer ID">
            <button class="btn button" id="call-peer">Call Peer</button>
            <button class="btn button1" id="shareScreen">Share Screen</button>
            <button class="btn button1" id="endcall">end</button>
        </div>
    </div>
</div>
<?php }elseif($_SESSION["recruiter"]){
       $sql=$conn->prepare("SELECT r.r_name,s.s_name FROM st_details AS s,rc_details AS r WHERE s.s_id=? AND r.r_id=?");
       $sql->bindParam(1,$remoteid);
       $sql->bindParam(2,$ourid);
       $sql->execute();
       $row=$sql->fetch(PDO::FETCH_ASSOC);
   
?>
<div class="">
        <div>
            <h1 class="title text-center">Welcome to Qualifind Live Meet</h1>
            <div class="inline">
                <input class="text-center ft id" value="" id="show-peer" disabled/>
                <div class="text-center copy">copy it manually and send to seeker</div>
            </div>
            
               
                          
            </div>

        <div class="container-fluid">

            <div class="row">
                
                <div class="col-sm-6 mt-3 mb-3 " >
                    <div class="card main" style="background: transparent;">
                        <div class="card-body cb">
                            <h5 class="card-title"><?php echo $row["r_name"] ?></h5>
                            
                            <div id="ourVideo"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3 mb-3 ">
                    <div class="card  main" style="background: transparent;">
                        <div class="card-body  cb">
                            <h5 class="card-title"><?php echo $row["s_name"] ?></h5>
                            
                            <div id="remoteVideo"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="inline">
            <h3 class="text-center" id="">Find Your Qualifind</h3>
        </div>
    </div>
    <div class="meetfooter">
    <div class="row">
        <div class="col text-center">
            <input class="bottominput ft" id="peerID" placeholder="peer ID">
            <button class="btn button" id="call-peer">Call Peer</button>
            <button class="btn button1" id="shareScreen">Share Screen</button>
            <button class="btn button1" id="endcall">end</button>
        </div>
    </div>
</div>
<?php }else{
?>
    <h1>Haltino tha</h1>
<?php }?>
<script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>


<script>
    //on load page
    window.addEventListener('load', (e) => {
        var peer = new Peer();
        var curPeer;
        var myStream;
        var peerList = [];
        let conn;
        //different id generate
        peer.on('open', function (id) {
            document.getElementById('show-peer').value = id
        })
        //call function
        peer.on("call", function (call) {
            var answerCall = confirm("Do you want to answer?");
            console.log(answerCall)
            if (answerCall) {
                try{
                navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                }).then((stream) => {
                    myStream = stream
                    addOurVideo(stream)
                    call.answer(stream)
                    call.on('stream', function (remoteStream) {
                        if (!peerList.includes(call.peer)) {
                            addRemoteVideo(remoteStream)
                            curPeer = call.peerConnection
                            peerList.push(call.peer)
                        }

                    })
                    call.on("close", function(){
                        console.log("call closed up")
                       
                    })
                    
                }).catch((err) => {
                    console.log(err + "unable to get media")
                })    
                }catch(err){
                    console.log("here it is"+err);
                    alert("your permission for camera must be on!");
                }
                
            } else {
                console.log("call denied");
            }

        })


        //disconnect fn
        peer.on('disconnected',function(disconnect){
        var answerCall = confirm("Do you want end call?");
        if(answerCall){
        
        myStream.getTracks().forEach(track => track.stop());
        
        
        peer.removeAllListeners();
        peer.destroy();
        location.reload();
        } 
        })

        //call-peer click event
        document.getElementById('call-peer').addEventListener('click', (e) => {
            
            let remotePeerId = document.getElementById("peerID").value;
            let myID=document.getElementById('show-peer').value ;
            if(remotePeerId==myID || remotePeerId==""){
               alert("you can not call to yourself!!!"); 
            }else{
            document.getElementById('show-peer').innerHTML = "connected " + remotePeerId;
            callPeer(remotePeerId);
                
            }
        })
        //endcall click event
        document.getElementById("endcall").addEventListener("click",(e)=>{
            let remotePeerId = document.getElementById("peerID").value;
            document.getElementById('show-peer').innerHTML = "disconnected " + remotePeerId;
            var vidTrack = myStream.getVideoTracks();
            vidTrack.forEach(track => track.enabled = false); 
            let sender = curPeer.getSenders().find(function (s) {
                return s.track.kind=="video"
            });
            sender.replaceTrack(vidTrack)
            peer.disconnect()
            location.reload();
        })
        //shareScreen click event
        document.getElementById('shareScreen').addEventListener('click', (e) => {
            navigator.mediaDevices.getDisplayMedia({
                video: {
                    cursor: "always"
                },
                audio: {
                    echoCancellation: true,
                    noiseSuppression: true
                }
            }).then((stream) => {
                let videoTrack = stream.getVideoTracks()[0];
                videoTrack.onended = function () {
                    stopScreenShare();
                }
                let sender = curPeer.getSenders().find(function (s) {
                    return s.track.kind == videoTrack.kind
                });
                sender.replaceTrack(videoTrack)
            }).catch((err) => {
                console.log(err + "unable to get d media")
            })
        })

        function removecall(id){
            let stream=null;
            let call=peer.disconnect(id,stream);

        }
        function callPeer(id) {
            try{
                
                 navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            }).then((stream) => {
                myStream = stream
                let videoTrack = stream.getVideoTracks()[0];
                addOurVideo(stream)
                let call = peer.call(id, stream)
                call.on('stream', function (remoteStream) {
                    if (!peerList.includes(call.peer)) {
                        addRemoteVideo(remoteStream)
                        curPeer = call.peerConnection
                        peerList.push(call.peer)
                    }

                })
                call.on("close",function(){
                    // console.log(id);
                    console.log("call closed down")
                })
            }).catch((err) => {
                console.log(err + "unable to get media")
            })

                
            }catch(err){
                alert("try again later!!")
            }
           
        }
        
        function stopScreenShare() {
            let videoTrack = myStream.getVideoTracks()[0];
            var sender = curPeer.getSenders().find(function (s) {
                return s.track.kind == videoTrack.kind;
            })

            sender.replaceTrack(videoTrack)
        }

        function addRemoteVideo(stream) {
            let video = document.createElement("video");
            video.classList.add('video')
            video.srcObject = stream;
            video.controls=true;
            video.onended=function () {
                video.pause();
            }
            video.play();
            document.getElementById('remoteVideo').append(video)
        }
        function addOurVideo(stream) {
            let video = document.createElement("video");
            video.classList.add('video')
            video.srcObject = stream;
            video.onended=function () {
                video.pause();
            }
            video.muted = true;
            
            video.play()
            document.getElementById('ourVideo').append(video)
        }


    })
</script>