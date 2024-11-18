let EditChecklist1_Icon = document.querySelector('.EditChecklist1_Icon');
let EditSmallBoats_Checklist = document.querySelector('.EditSmallBoats_Checklist');
let EditSmallBoats_Checklist_CloseButton = document.querySelector('.EditSmallBoats_Checklist .cancel-button-small-boats-checklist');
let EditSmallBoats_ChecklistButton = document.querySelector('.EditSmallBoats_ChecklistButton');
let EditSmallBoats_ChecklistForm = document.querySelector('.EditSmallBoats_ChecklistForm');

EditChecklist1_Icon.addEventListener('click', () => {
    EditSmallBoats_Checklist.style.display = 'flex';
    EditSmallBoats_Checklist.style.zIndex = '210'; 

    EditSmallBoats_Checklist_CloseButton.addEventListener('click', () => {
        EditSmallBoats_Checklist.style.display = 'none';
    })
})

let OpenMaintenanceInfoIcon = document.querySelectorAll('.OpenMaintenanceInfoIcon');
let Diagram1 = document.querySelector('.Diagram1');
let Diagram1_CloseButton = document.querySelector('.Diagram1 .Close');
let Diagram1_VesselName = document.querySelector('.Diagram1 .VesselName h2');
let Diagram1_VesselStatus = document.querySelector('.Diagram1 .VesselName .indicator .status-x');
let Checklist1_PdfIcons = document.querySelectorAll('.Checklist1_PdfIcon');

let Checklist1_VesselName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=Boat]');
let Checklist1_Date_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Date]');
let Checklist1_Port_PlaceOfHandover_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Port_PlaceOfHandover]');
let Checklist1_OutgoingCapt_EngName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=OutgoingCapt_EngName]');
let Checklist1_IncomingCapt_EngName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=IncomingCapt_EngName]');
let Checklist1_OutgoingCapt_EngineerName_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input textarea[name=Outgoing_Captain_Engineer]');
let Checklist1_IncomingCapt_EngineerName_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input textarea[name=Incoming_Captain_Engineer]');
let PdfWrapper = document.querySelector('.PdfWrapper');

OpenMaintenanceInfoIcon.forEach(Icon => {
    Icon.addEventListener('click', () => {
    let Checklist1Id = Icon.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.textContent;
    let Status = Icon.nextElementSibling.textContent.split(" ")[0];
    EditSmallBoats_ChecklistButton.nextElementSibling.textContent = Checklist1Id;
      Diagram1.style.display = 'flex'; 
      Diagram1_VesselStatus.className = '';
      Diagram1_VesselStatus.classList.add('status-x', Status);
      Diagram1_VesselName.textContent = Icon.nextElementSibling.nextElementSibling.textContent;
      PdfWrapper.firstElementChild.textContent = Checklist1Id;
      PdfWrapper.firstElementChild.nextElementSibling.textContent = Diagram1_VesselName.textContent;
      Checklist1_VesselName_Edit.value = Diagram1_VesselName.textContent;
      const Checklist1_Data = Icon.nextElementSibling.nextElementSibling.nextElementSibling; 
      Checklist1_Date_Edit.value = Checklist1_Data.querySelector('.Date').textContent;
      Checklist1_Port_PlaceOfHandover_Edit.value = Checklist1_Data.querySelector('.Port_PlaceOfHandover').textContent;
      Checklist1_OutgoingCapt_EngName_Edit.value = Checklist1_Data.querySelector('.OutgoingCapt_EngName').textContent;
      Checklist1_IncomingCapt_EngName_Edit.value = Checklist1_Data.querySelector('.IncomingCapt_EngName').textContent;
      Checklist1_OutgoingCapt_EngineerName_Comment_Edit.value = Checklist1_Data.querySelector('.Outgoing_Captain_Engineer_Comment').textContent;
      Checklist1_IncomingCapt_EngineerName_Comment_Edit.value = Checklist1_Data.querySelector('.Incoming_Captain_Engineer_Comment').textContent;
      // 
      InputFields.forEach(InputField => {
        if (Checklist1_Data.querySelector('.' + InputField).textContent == 'Good') {
            document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=Good]').checked = true;
            document.querySelector('.' + InputField + '_Indicator').setAttribute('src', window.location.origin + '/Images/yes.png')
          } else if (Checklist1_Data.querySelector('.' + InputField).textContent == 'NotGood') {
            document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + InputField + '][value=NotGood]').checked = true;
            document.querySelector('.' + InputField + '_Indicator').setAttribute('src', window.location.origin + '/Images/no.png')
        }
        if (document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + InputField + '_Comment]') === null) {
            return; 
        }
        document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + InputField + '_Comment]').value = Checklist1_Data.querySelector('.' + InputField + '_Comment').textContent;
      });
      // 
        let Yes_Indicator = document.querySelectorAll('img[src="' + window.location.origin + '/Images/yes.png"]').length;
        let No_Indicator = document.querySelectorAll('img[src="' + window.location.origin + '/Images/no.png"]').length;
        let DataProgress = document.querySelectorAll('.progress[data-progress]'); 
        let Sum = Yes_Indicator + No_Indicator;
        let GoodCondition = document.querySelector('.progress.GoodCondition');
        let NeedsAttention = document.querySelector('.progress.NeedsAttention');
        let GoodCondition_ = document.querySelector('.item_value.GoodCondition').textContent = Math.round(((Yes_Indicator / Sum) * 100)) + '%';
        let NeedsAttention_ = document.querySelector('.item_value.NeedsAttention').textContent = Math.round(((No_Indicator / Sum) * 100)) + '%';
        GoodCondition.style.width = GoodCondition_;
        NeedsAttention.style.width = NeedsAttention_;
        GoodCondition.setAttribute('data-progress', (Yes_Indicator / Sum) * 100);
        NeedsAttention.setAttribute('data-progress', (No_Indicator / Sum) * 100); 
  })
  Diagram1_CloseButton.addEventListener('click', () => {
      Diagram1.style.display = 'none';
      Diagram1_VesselStatus.classList.remove(Status);
  })
  Checklist1_PdfIcons.forEach(PdfIcon => {
    PdfIcon.addEventListener('click', () => {
        let Checklist1Id = PdfIcon.parentElement.firstElementChild.textContent;  
        let BoatName = PdfIcon.parentElement.firstElementChild.nextElementSibling.textContent; 
        // let BoatName = Diagram1_VesselName.textContent;  
        // let Checklist1Id = EditSmallBoats_ChecklistButton.nextElementSibling.textContent; 
        window.open('/Availability/Report/Checklists/SmallBoats/?Boat='+ BoatName + '&Id=' + Checklist1Id);
      })
  });
});

let Checklist1_Edit_Error = document.querySelector('.error-edit-small-boats-checklist'); 
EditSmallBoats_ChecklistButton.addEventListener('click', () => {
      Checklist1_Edit_Error.textContent = '';
      let Checklist1Id = EditSmallBoats_ChecklistButton.nextElementSibling.textContent;
      SelectFields.forEach(SelectField => { 
        if (document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').value == '') {
            Checklist1_Edit_Error.textContent = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.textContent + ' field is required';
            document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.style.color = 'red';
            return;
        } else if (!(document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').value == '')) {
            document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=' + SelectField + ']').parentElement.firstElementChild.style.color = '#888';
            return;
        } 
    });
    OtherFields.forEach(OtherField => {
        if (document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').value == '') {
            Checklist1_Edit_Error.textContent = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.textContent + ' field is required';
            document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.style.color = 'red';
            return;
        } else if (!(document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').value == '')) {
            document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=' + OtherField + ']').parentElement.firstElementChild.style.color = '#888';
            return;
        } 
    }); 
    if (Checklist1_Edit_Error.textContent == '') { 
        EditSmallBoats_ChecklistButton.style.backgroundColor = '#1fb95e';
        EditSmallBoats_ChecklistButton.textContent = '+ Processing..';
        EditSmallBoats_ChecklistForm.setAttribute('action', '/Edit/Checklist1/' + Checklist1Id);
        EditSmallBoats_ChecklistForm.submit();
    }
})