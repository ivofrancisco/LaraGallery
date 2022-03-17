let confirmBox=document.querySelector('.s-box-wrapper'),deletionForm=document.querySelectorAll('.item-delete');function openBox(element){element.classList.add('about-to-delete');confirmBox.classList.add('open-box')}
function onCancel(){confirmBox.classList.remove('open-box');document.querySelector('.item-delete').classList.remove('about-to-delete')}
function onConfirm(){document.querySelector('.about-to-delete').submit()}
deletionForm.forEach(function(item){item.addEventListener('click',function(e){e.preventDefault();openBox(this)})})