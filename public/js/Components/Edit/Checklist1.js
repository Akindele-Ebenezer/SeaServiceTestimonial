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
let Checklist1_PdfIcon = document.querySelector('.Checklist1_PdfIcon');

let Checklist1_VesselName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=Boat]');
let Checklist1_Date_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Date]');
let Checklist1_Port_PlaceOfHandover_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Port_PlaceOfHandover]');
let Checklist1_OutgoingCapt_EngName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=OutgoingCapt_EngName]');
let Checklist1_IncomingCapt_EngName_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input select[name=IncomingCapt_EngName]');
let Checklist1_OutgoingCapt_EngineerName_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input textarea[name=Outgoing_Captain_Engineer]');
let Checklist1_IncomingCapt_EngineerName_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input textarea[name=Incoming_Captain_Engineer]');
let Checklist1_Clean_Tidy_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Clean_Tidy][value=Good]');
let Checklist1_Clean_Tidy_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Clean_Tidy][value=NotGood]');
let Checklist1_Clean_Tidy_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Clean_Tidy_Comment]');
let Checklist1_VHF_1_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_1][value=Good]');
let Checklist1_VHF_1_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_1][value=NotGood]');
let Checklist1_VHF_1_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_1_Comment]');
let Checklist1_VHF_2_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_2][value=Good]');
let Checklist1_VHF_2_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_2][value=NotGood]');
let Checklist1_VHF_2_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=VHF_2_Comment]');
let Checklist1_Handheld_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Handheld][value=Good]');
let Checklist1_Handheld_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Handheld][value=NotGood]');
let Checklist1_Handheld_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Handheld_Comment]');
let Checklist1_AIS_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AIS][value=Good]');
let Checklist1_AIS_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AIS][value=NotGood]');
let Checklist1_AIS_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AIS_Comment]');
let Checklist1_SOPToDate_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SOPToDate][value=Good]');
let Checklist1_SOPToDate_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SOPToDate][value=NotGood]');
let Checklist1_SOPToDate_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SOPToDate_Comment]');
let Checklist1_CompanyOrdersToDate_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=CompanyOrdersToDate][value=Good]');
let Checklist1_CompanyOrdersToDate_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=CompanyOrdersToDate][value=NotGood]');
let Checklist1_CompanyOrdersToDate_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=CompanyOrdersToDate_Comment]');
let Checklist1_LogbooksToDate_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LogbooksToDate][value=Good]');
let Checklist1_LogbooksToDate_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LogbooksToDate][value=NotGood]');
let Checklist1_LogbooksToDate_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LogbooksToDate_Comment]');
let Checklist1_RequisitionBookToDate_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=RequisitionBookToDate][value=Good]');
let Checklist1_RequisitionBookToDate_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=RequisitionBookToDate][value=NotGood]');
let Checklist1_RequisitionBookToDate_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=RequisitionBookToDate_Comment]');
let Checklist1_PendingRequisutions_Name_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PendingRequisutions_Name][value=Good]');
let Checklist1_PendingRequisutions_Name_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PendingRequisutions_Name][value=NotGood]');
let Checklist1_PendingRequisutions_Name_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PendingRequisutions_Name_Comment]');
let Checklist1_SteeringSytem_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SteeringSytem][value=Good]');
let Checklist1_SteeringSytem_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SteeringSytem][value=NotGood]');
let Checklist1_SteeringSytem_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SteeringSytem_Comment]');
let Checklist1_EmergencySteering_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EmergencySteering][value=Good]');
let Checklist1_EmergencySteering_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EmergencySteering][value=NotGood]');
let Checklist1_EmergencySteering_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EmergencySteering_Comment]');
let Checklist1_NavigationalLights_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=NavigationalLights][value=Good]');
let Checklist1_NavigationalLights_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=NavigationalLights][value=NotGood]');
let Checklist1_NavigationalLights_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=NavigationalLights_Comment]');
let Checklist1_SearchLight_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SearchLight][value=Good]');
let Checklist1_SearchLight_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SearchLight][value=NotGood]');
let Checklist1_SearchLight_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=SearchLight_Comment]');
let Checklist1_A_B_Flags_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=A_B_Flags][value=Good]');
let Checklist1_A_B_Flags_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=A_B_Flags][value=NotGood]');
let Checklist1_A_B_Flags_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=A_B_Flags_Comment]');
let Checklist1_Siren_Horn_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Siren_Horn][value=Good]');
let Checklist1_Siren_Horn_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Siren_Horn][value=NotGood]');
let Checklist1_Siren_Horn_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Siren_Horn_Comment]');
let Checklist1_MagneticCompass_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=MagneticCompass][value=Good]');
let Checklist1_MagneticCompass_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=MagneticCompass][value=NotGood]');
let Checklist1_MagneticCompass_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=MagneticCompass_Comment]');
let Checklist1_Radar_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Radar][value=Good]');
let Checklist1_Radar_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Radar][value=NotGood]');
let Checklist1_Radar_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Radar_Comment]');
let Checklist1_EchoSounder_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EchoSounder][value=Good]');
let Checklist1_EchoSounder_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EchoSounder][value=NotGood]');
let Checklist1_EchoSounder_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EchoSounder_Comment]');
let Checklist1_GPS_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GPS][value=Good]');
let Checklist1_GPS_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GPS][value=NotGood]');
let Checklist1_GPS_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GPS_Comment]');
let Checklist1_BitsAndBollards_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=BitsAndBollards][value=Good]');
let Checklist1_BitsAndBollards_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=BitsAndBollards][value=NotGood]');
let Checklist1_BitsAndBollards_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=BitsAndBollards_Comment]');
let Checklist1_ConditionOfRopes_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfRopes][value=Good]');
let Checklist1_ConditionOfRopes_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfRopes][value=NotGood]');
let Checklist1_ConditionOfRopes_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfRopes_Comment]');
let Checklist1_ConditionOfWindows_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfWindows][value=Good]');
let Checklist1_ConditionOfWindows_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfWindows][value=NotGood]');
let Checklist1_ConditionOfWindows_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfWindows_Comment]');
let Checklist1_LifeRaftsAndCradles_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRaftsAndCradles][value=Good]');
let Checklist1_LifeRaftsAndCradles_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRaftsAndCradles][value=NotGood]');
let Checklist1_LifeRaftsAndCradles_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRaftsAndCradles_Comment]');
let Checklist1_LifeRings_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRings][value=Good]');
let Checklist1_LifeRings_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRings][value=NotGood]');
let Checklist1_LifeRings_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeRings_Comment]');
let Checklist1_LifeJacketsAndWorkVest_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeJacketsAndWorkVest][value=Good]');
let Checklist1_LifeJacketsAndWorkVest_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeJacketsAndWorkVest][value=NotGood]');
let Checklist1_LifeJacketsAndWorkVest_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LifeJacketsAndWorkVest_Comment]');
let Checklist1_DeckMaintenanceCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=DeckMaintenanceCondition][value=Good]');
let Checklist1_DeckMaintenanceCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=DeckMaintenanceCondition][value=NotGood]');
let Checklist1_DeckMaintenanceCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=DeckMaintenanceCondition_Comment]');
let Checklist1_AccommodationMaintenanceCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AccommodationMaintenanceCondition][value=Good]');
let Checklist1_AccommodationMaintenanceCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AccommodationMaintenanceCondition][value=NotGood]');
let Checklist1_AccommodationMaintenanceCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AccommodationMaintenanceCondition_Comment]');
let Checklist1_PilotHandrailsCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PilotHandrailsCondition][value=Good]');
let Checklist1_PilotHandrailsCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PilotHandrailsCondition][value=NotGood]');
let Checklist1_PilotHandrailsCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=PilotHandrailsCondition_Comment]');
let Checklist1_TyreFenderCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=TyreFenderCondition][value=Good]');
let Checklist1_TyreFenderCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=TyreFenderCondition][value=NotGood]');
let Checklist1_TyreFenderCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=TyreFenderCondition_Comment]');
let Checklist1_HullFendersCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=HullFendersCondition][value=Good]');
let Checklist1_HullFendersCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=HullFendersCondition][value=NotGood]');
let Checklist1_HullFendersCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=HullFendersCondition_Comment]');
let Checklist1_GarbageCollecting_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageCollecting][value=Good]');
let Checklist1_GarbageCollecting_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageCollecting][value=NotGood]');
let Checklist1_GarbageCollecting_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageCollecting_Comment]');
let Checklist1_GarbageDepositing_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageDepositing][value=Good]');
let Checklist1_GarbageDepositing_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageDepositing][value=NotGood]');
let Checklist1_GarbageDepositing_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=GarbageDepositing_Comment]');
let Checklist1_EngineSmoking_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EngineSmoking][value=Good]');
let Checklist1_EngineSmoking_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EngineSmoking][value=NotGood]');
let Checklist1_EngineSmoking_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=EngineSmoking_Comment]');
let Checklist1_Extinguishers_Exp_Date_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Extinguishers_Exp_Date][value=Good]');
let Checklist1_Extinguishers_Exp_Date_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Extinguishers_Exp_Date][value=NotGood]');
let Checklist1_Extinguishers_Exp_Date_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Extinguishers_Exp_Date_Comment]');
let Checklist1_FireHosesCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FireHosesCondition][value=Good]');
let Checklist1_FireHosesCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FireHosesCondition][value=NotGood]');
let Checklist1_FireHosesCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FireHosesCondition_Comment]');
let Checklist1_Nozzles_NoCondition_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Nozzles_NoCondition][value=Good]');
let Checklist1_Nozzles_NoCondition_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Nozzles_NoCondition][value=NotGood]');
let Checklist1_Nozzles_NoCondition_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Nozzles_NoCondition_Comment]');
let Checklist1_AllCrewOnBoard_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AllCrewOnBoard][value=Good]');
let Checklist1_AllCrewOnBoard_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AllCrewOnBoard][value=NotGood]');
let Checklist1_AllCrewOnBoard_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=AllCrewOnBoard_Comment]');
let Checklist1_FuelOil_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FuelOil][value=Good]');
let Checklist1_FuelOil_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FuelOil][value=NotGood]');
let Checklist1_FuelOil_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FuelOil_Comment]');
let Checklist1_LubeOil_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil][value=Good]');
let Checklist1_LubeOil_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil][value=NotGood]');
let Checklist1_LubeOil_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil_Comment]');
let Checklist1_FreshWater_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FreshWater][value=Good]');
let Checklist1_FreshWater_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FreshWater][value=NotGood]');
let Checklist1_FreshWater_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=FreshWater_Comment]');
let Checklist1_ConditionOfMainEngine_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfMainEngine][value=Good]');
let Checklist1_ConditionOfMainEngine_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfMainEngine][value=NotGood]');
let Checklist1_ConditionOfMainEngine_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfMainEngine_Comment]');
let Checklist1_LubeOil_Cons_hour_Engine_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil_Cons_hour_Engine][value=Good]');
let Checklist1_LubeOil_Cons_hour_Engine_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil_Cons_hour_Engine][value=NotGood]');
let Checklist1_LubeOil_Cons_hour_Engine_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=LubeOil_Cons_hour_Engine_Comment]');
let Checklist1_ConditionOfGearBox_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGearBox][value=Good]');
let Checklist1_ConditionOfGearBox_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGearBox][value=NotGood]');
let Checklist1_ConditionOfGearBox_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGearBox_Comment]');
let Checklist1_ConditionOfGenSet_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGenSet][value=Good]');
let Checklist1_ConditionOfGenSet_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGenSet][value=NotGood]');
let Checklist1_ConditionOfGenSet_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfGenSet_Comment]');
let Checklist1_ConditionOfBilgePump_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgePump][value=Good]');
let Checklist1_ConditionOfBilgePump_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgePump][value=NotGood]');
let Checklist1_ConditionOfBilgePump_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgePump_Comment]');
let Checklist1_ConditionOfBilgeSystem_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgeSystem][value=Good]');
let Checklist1_ConditionOfBilgeSystem_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgeSystem][value=NotGood]');
let Checklist1_ConditionOfBilgeSystem_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBilgeSystem_Comment]');
let Checklist1_ConditionOfBattery_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBattery][value=Good]');
let Checklist1_ConditionOfBattery_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBattery][value=NotGood]');
let Checklist1_ConditionOfBattery_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ConditionOfBattery_Comment]');
let Checklist1_ShoreConnectionCables_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ShoreConnectionCables][value=Good]');
let Checklist1_ShoreConnectionCables_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ShoreConnectionCables][value=NotGood]');
let Checklist1_ShoreConnectionCables_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=ShoreConnectionCables_Comment]');
let Checklist1_Outgoing_Captain_Engineer_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Outgoing_Captain_Engineer][value=Good]');
let Checklist1_Outgoing_Captain_Engineer_Edit_ = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Outgoing_Captain_Engineer][value=NotGood]');
let Checklist1_Outgoing_Captain_Engineer_Comment_Edit = document.querySelector('.EditSmallBoats_ChecklistForm .input input[name=Outgoing_Captain_Engineer_Comment]');

OpenMaintenanceInfoIcon.forEach(Icon => {
    Icon.addEventListener('click', () => {
    let Checklist1Id = Icon.nextElementSibling.nextElementSibling.nextElementSibling.firstElementChild.textContent;
    let Status = Icon.nextElementSibling.textContent.split(" ")[0];
    EditSmallBoats_ChecklistButton.nextElementSibling.textContent = Checklist1Id;
      Diagram1.style.display = 'flex'; 
      Diagram1_VesselStatus.className = '';
      Diagram1_VesselStatus.classList.add('status-x', Status);
      Diagram1_VesselName.textContent = Icon.nextElementSibling.nextElementSibling.textContent;
      Checklist1_VesselName_Edit.value = Diagram1_VesselName.textContent;
      const Checklist1_Data = Icon.nextElementSibling.nextElementSibling.nextElementSibling; 
      Checklist1_Date_Edit.value = Checklist1_Data.querySelector('.Date').textContent;
      Checklist1_Port_PlaceOfHandover_Edit.value = Checklist1_Data.querySelector('.Port_PlaceOfHandover').textContent;
      Checklist1_OutgoingCapt_EngName_Edit.value = Checklist1_Data.querySelector('.OutgoingCapt_EngName').textContent;
      Checklist1_IncomingCapt_EngName_Edit.value = Checklist1_Data.querySelector('.IncomingCapt_EngName').textContent;
      Checklist1_OutgoingCapt_EngineerName_Comment_Edit.value = Checklist1_Data.querySelector('.Outgoing_Captain_Engineer_Comment').textContent;
      Checklist1_IncomingCapt_EngineerName_Comment_Edit.value = Checklist1_Data.querySelector('.Incoming_Captain_Engineer_Comment').textContent;
      if (Checklist1_Data.querySelector('.Clean_Tidy').textContent == 'Good') {
          Checklist1_Clean_Tidy_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Clean_Tidy').textContent == 'NotGood') {
          Checklist1_Clean_Tidy_Edit_.checked = true;
      }
      Checklist1_Clean_Tidy_Comment_Edit.value = Checklist1_Data.querySelector('.Clean_Tidy_Comment').textContent;
      if (Checklist1_Data.querySelector('.VHF_1').textContent == 'Good') {
          Checklist1_VHF_1_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.VHF_1').textContent == 'NotGood') {
          Checklist1_VHF_1_Edit_.checked = true;
      }
      Checklist1_VHF_1_Comment_Edit.value = Checklist1_Data.querySelector('.VHF_1_Comment').textContent;
      if (Checklist1_Data.querySelector('.VHF_2').textContent == 'Good') {
          Checklist1_VHF_2_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.VHF_2').textContent == 'NotGood') {
          Checklist1_VHF_2_Edit_.checked = true;
      }
      Checklist1_VHF_2_Comment_Edit.value = Checklist1_Data.querySelector('.VHF_2_Comment').textContent;
      if (Checklist1_Data.querySelector('.Handheld').textContent == 'Good') {
          Checklist1_Handheld_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Handheld').textContent == 'NotGood') {
          Checklist1_Handheld_Edit_.checked = true;
      }
      Checklist1_Handheld_Comment_Edit.value = Checklist1_Data.querySelector('.Handheld_Comment').textContent;
      if (Checklist1_Data.querySelector('.AIS').textContent == 'Good') {
          Checklist1_AIS_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.AIS').textContent == 'NotGood') {
          Checklist1_AIS_Edit_.checked = true;
      }
      Checklist1_AIS_Comment_Edit.value = Checklist1_Data.querySelector('.AIS_Comment').textContent;
      if (Checklist1_Data.querySelector('.SOPToDate').textContent == 'Good') {
          Checklist1_SOPToDate_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.SOPToDate').textContent == 'NotGood') {
          Checklist1_SOPToDate_Edit_.checked = true;
      }
      Checklist1_SOPToDate_Comment_Edit.value = Checklist1_Data.querySelector('.SOPToDate_Comment').textContent;
      if (Checklist1_Data.querySelector('.CompanyOrdersToDate').textContent == 'Good') {
          Checklist1_CompanyOrdersToDate_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.CompanyOrdersToDate').textContent == 'NotGood') {
          Checklist1_CompanyOrdersToDate_Edit_.checked = true;
      }
      Checklist1_CompanyOrdersToDate_Comment_Edit.value = Checklist1_Data.querySelector('.CompanyOrdersToDate_Comment').textContent;
      if (Checklist1_Data.querySelector('.LogbooksToDate').textContent == 'Good') {
          Checklist1_LogbooksToDate_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LogbooksToDate').textContent == 'NotGood') {
          Checklist1_LogbooksToDate_Edit_.checked = true;
      }
      Checklist1_LogbooksToDate_Comment_Edit.value = Checklist1_Data.querySelector('.LogbooksToDate_Comment').textContent;
      if (Checklist1_Data.querySelector('.RequisitionBookToDate').textContent == 'Good') {
          Checklist1_RequisitionBookToDate_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.RequisitionBookToDate').textContent == 'NotGood') {
          Checklist1_RequisitionBookToDate_Edit_.checked = true;
      }
      Checklist1_RequisitionBookToDate_Comment_Edit.value = Checklist1_Data.querySelector('.RequisitionBookToDate_Comment').textContent;
      if (Checklist1_Data.querySelector('.PendingRequisutions_Name').textContent == 'Good') {
          Checklist1_PendingRequisutions_Name_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.PendingRequisutions_Name').textContent == 'NotGood') {
          Checklist1_PendingRequisutions_Name_Edit_.checked = true;
      }
      Checklist1_PendingRequisutions_Name_Comment_Edit.value = Checklist1_Data.querySelector('.PendingRequisutions_Name_Comment').textContent;
      if (Checklist1_Data.querySelector('.SteeringSytem').textContent == 'Good') {
          Checklist1_SteeringSytem_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.SteeringSytem').textContent == 'NotGood') {
          Checklist1_SteeringSytem_Edit_.checked = true;
      }
      Checklist1_SteeringSytem_Comment_Edit.value = Checklist1_Data.querySelector('.SteeringSytem_Comment').textContent;
      if (Checklist1_Data.querySelector('.EmergencySteering').textContent == 'Good') {
          Checklist1_EmergencySteering_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.EmergencySteering').textContent == 'NotGood') {
          Checklist1_EmergencySteering_Edit_.checked = true;
      }
      Checklist1_EmergencySteering_Comment_Edit.value = Checklist1_Data.querySelector('.EmergencySteering_Comment').textContent;
      if (Checklist1_Data.querySelector('.NavigationalLights').textContent == 'Good') {
          Checklist1_NavigationalLights_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.NavigationalLights').textContent == 'NotGood') {
          Checklist1_NavigationalLights_Edit_.checked = true;
      }
      Checklist1_NavigationalLights_Comment_Edit.value = Checklist1_Data.querySelector('.NavigationalLights_Comment').textContent;
      if (Checklist1_Data.querySelector('.SearchLight').textContent == 'Good') {
          Checklist1_SearchLight_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.SearchLight').textContent == 'NotGood') {
          Checklist1_SearchLight_Edit_.checked = true;
      }
      Checklist1_SearchLight_Comment_Edit.value = Checklist1_Data.querySelector('.SearchLight_Comment').textContent;
      if (Checklist1_Data.querySelector('.A_B_Flags').textContent == 'Good') {
          Checklist1_A_B_Flags_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.A_B_Flags').textContent == 'NotGood') {
          Checklist1_A_B_Flags_Edit_.checked = true;
      }
      Checklist1_A_B_Flags_Comment_Edit.value = Checklist1_Data.querySelector('.A_B_Flags_Comment').textContent;
      if (Checklist1_Data.querySelector('.Siren_Horn').textContent == 'Good') {
          Checklist1_Siren_Horn_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Siren_Horn').textContent == 'NotGood') {
          Checklist1_Siren_Horn_Edit_.checked = true;
      }
      Checklist1_Siren_Horn_Comment_Edit.value = Checklist1_Data.querySelector('.Siren_Horn_Comment').textContent;
      if (Checklist1_Data.querySelector('.MagneticCompass').textContent == 'Good') {
          Checklist1_MagneticCompass_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.MagneticCompass').textContent == 'NotGood') {
          Checklist1_MagneticCompass_Edit_.checked = true;
      }
      Checklist1_MagneticCompass_Comment_Edit.value = Checklist1_Data.querySelector('.MagneticCompass_Comment').textContent;
      if (Checklist1_Data.querySelector('.Radar').textContent == 'Good') {
          Checklist1_Radar_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Radar').textContent == 'NotGood') {
          Checklist1_Radar_Edit_.checked = true;
      }
      Checklist1_Radar_Comment_Edit.value = Checklist1_Data.querySelector('.Radar_Comment').textContent;
      if (Checklist1_Data.querySelector('.EchoSounder').textContent == 'Good') {
          Checklist1_EchoSounder_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.EchoSounder').textContent == 'NotGood') {
          Checklist1_EchoSounder_Edit_.checked = true;
      }
      Checklist1_EchoSounder_Comment_Edit.value = Checklist1_Data.querySelector('.EchoSounder_Comment').textContent;
      if (Checklist1_Data.querySelector('.GPS').textContent == 'Good') {
          Checklist1_GPS_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.GPS').textContent == 'NotGood') {
          Checklist1_GPS_Edit_.checked = true;
      }
      Checklist1_GPS_Comment_Edit.value = Checklist1_Data.querySelector('.GPS_Comment').textContent;
      if (Checklist1_Data.querySelector('.BitsAndBollards').textContent == 'Good') {
          Checklist1_BitsAndBollards_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.BitsAndBollards').textContent == 'NotGood') {
          Checklist1_BitsAndBollards_Edit_.checked = true;
      }
      Checklist1_BitsAndBollards_Comment_Edit.value = Checklist1_Data.querySelector('.BitsAndBollards_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfRopes').textContent == 'Good') {
          Checklist1_ConditionOfRopes_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfRopes').textContent == 'NotGood') {
          Checklist1_ConditionOfRopes_Edit_.checked = true;
      }
      Checklist1_ConditionOfRopes_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfRopes_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfWindows').textContent == 'Good') {
          Checklist1_ConditionOfWindows_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfWindows').textContent == 'NotGood') {
          Checklist1_ConditionOfWindows_Edit_.checked = true;
      }
      Checklist1_ConditionOfWindows_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfWindows_Comment').textContent;
      if (Checklist1_Data.querySelector('.LifeRaftsAndCradles').textContent == 'Good') {
          Checklist1_LifeRaftsAndCradles_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LifeRaftsAndCradles').textContent == 'NotGood') {
          Checklist1_LifeRaftsAndCradles_Edit_.checked = true;
      }
      Checklist1_LifeRaftsAndCradles_Comment_Edit.value = Checklist1_Data.querySelector('.LifeRaftsAndCradles_Comment').textContent;
      if (Checklist1_Data.querySelector('.LifeRings').textContent == 'Good') {
          Checklist1_LifeRings_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LifeRings').textContent == 'NotGood') {
          Checklist1_LifeRings_Edit_.checked = true;
      }
      Checklist1_LifeRings_Comment_Edit.value = Checklist1_Data.querySelector('.LifeRings_Comment').textContent;
      if (Checklist1_Data.querySelector('.LifeJacketsAndWorkVest').textContent == 'Good') {
          Checklist1_LifeJacketsAndWorkVest_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LifeJacketsAndWorkVest').textContent == 'NotGood') {
          Checklist1_LifeJacketsAndWorkVest_Edit_.checked = true;
      }
      Checklist1_LifeJacketsAndWorkVest_Comment_Edit.value = Checklist1_Data.querySelector('.LifeJacketsAndWorkVest_Comment').textContent;
    //   
      if (Checklist1_Data.querySelector('.DeckMaintenanceCondition').textContent == 'Good') {
          Checklist1_DeckMaintenanceCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.DeckMaintenanceCondition').textContent == 'NotGood') {
          Checklist1_DeckMaintenanceCondition_Edit_.checked = true;
      }
      Checklist1_DeckMaintenanceCondition_Comment_Edit.value = Checklist1_Data.querySelector('.DeckMaintenanceCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.AccommodationMaintenanceCondition').textContent == 'Good') {
          Checklist1_AccommodationMaintenanceCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.AccommodationMaintenanceCondition').textContent == 'NotGood') {
          Checklist1_AccommodationMaintenanceCondition_Edit_.checked = true;
      }
      Checklist1_AccommodationMaintenanceCondition_Comment_Edit.value = Checklist1_Data.querySelector('.AccommodationMaintenanceCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.PilotHandrailsCondition').textContent == 'Good') {
          Checklist1_PilotHandrailsCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.PilotHandrailsCondition').textContent == 'NotGood') {
          Checklist1_PilotHandrailsCondition_Edit_.checked = true;
      }
      Checklist1_PilotHandrailsCondition_Comment_Edit.value = Checklist1_Data.querySelector('.PilotHandrailsCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.TyreFenderCondition').textContent == 'Good') {
          Checklist1_TyreFenderCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.TyreFenderCondition').textContent == 'NotGood') {
          Checklist1_TyreFenderCondition_Edit_.checked = true;
      }
      Checklist1_TyreFenderCondition_Comment_Edit.value = Checklist1_Data.querySelector('.TyreFenderCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.HullFendersCondition').textContent == 'Good') {
          Checklist1_HullFendersCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.HullFendersCondition').textContent == 'NotGood') {
          Checklist1_HullFendersCondition_Edit_.checked = true;
      }
      Checklist1_HullFendersCondition_Comment_Edit.value = Checklist1_Data.querySelector('.HullFendersCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.GarbageCollecting').textContent == 'Good') {
          Checklist1_GarbageCollecting_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.GarbageCollecting').textContent == 'NotGood') {
          Checklist1_GarbageCollecting_Edit_.checked = true;
      }
      Checklist1_GarbageCollecting_Comment_Edit.value = Checklist1_Data.querySelector('.GarbageCollecting_Comment').textContent;
      if (Checklist1_Data.querySelector('.GarbageDepositing').textContent == 'Good') {
          Checklist1_GarbageDepositing_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.GarbageDepositing').textContent == 'NotGood') {
          Checklist1_GarbageDepositing_Edit_.checked = true;
      }
      Checklist1_GarbageDepositing_Comment_Edit.value = Checklist1_Data.querySelector('.GarbageDepositing_Comment').textContent;
      if (Checklist1_Data.querySelector('.EngineSmoking').textContent == 'Good') {
          Checklist1_EngineSmoking_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.EngineSmoking').textContent == 'NotGood') {
          Checklist1_EngineSmoking_Edit_.checked = true;
      }
      Checklist1_EngineSmoking_Comment_Edit.value = Checklist1_Data.querySelector('.EngineSmoking_Comment').textContent;
      if (Checklist1_Data.querySelector('.Extinguishers_Exp_Date').textContent == 'Good') {
          Checklist1_Extinguishers_Exp_Date_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Extinguishers_Exp_Date').textContent == 'NotGood') {
          Checklist1_Extinguishers_Exp_Date_Edit_.checked = true;
      }
      Checklist1_Extinguishers_Exp_Date_Comment_Edit.value = Checklist1_Data.querySelector('.Extinguishers_Exp_Date_Comment').textContent;
      if (Checklist1_Data.querySelector('.FireHosesCondition').textContent == 'Good') {
          Checklist1_FireHosesCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.FireHosesCondition').textContent == 'NotGood') {
          Checklist1_FireHosesCondition_Edit_.checked = true;
      }
      Checklist1_FireHosesCondition_Comment_Edit.value = Checklist1_Data.querySelector('.FireHosesCondition_Comment').textContent;
      if (Checklist1_Data.querySelector('.Nozzles_NoCondition').textContent == 'Good') {
          Checklist1_Nozzles_NoCondition_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.Nozzles_NoCondition').textContent == 'NotGood') {
          Checklist1_Nozzles_NoCondition_Edit_.checked = true;
      }
      Checklist1_Nozzles_NoCondition_Comment_Edit.value = Checklist1_Data.querySelector('.Nozzles_NoCondition_Comment').textContent;
    //   
      if (Checklist1_Data.querySelector('.AllCrewOnBoard').textContent == 'Good') {
          Checklist1_AllCrewOnBoard_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.AllCrewOnBoard').textContent == 'NotGood') {
          Checklist1_AllCrewOnBoard_Edit_.checked = true;
      }
      Checklist1_AllCrewOnBoard_Comment_Edit.value = Checklist1_Data.querySelector('.AllCrewOnBoard_Comment').textContent;
      if (Checklist1_Data.querySelector('.FuelOil').textContent == 'Good') {
          Checklist1_FuelOil_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.FuelOil').textContent == 'NotGood') {
          Checklist1_FuelOil_Edit_.checked = true;
      }
      Checklist1_FuelOil_Comment_Edit.value = Checklist1_Data.querySelector('.FuelOil_Comment').textContent;
      if (Checklist1_Data.querySelector('.LubeOil').textContent == 'Good') {
          Checklist1_LubeOil_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LubeOil').textContent == 'NotGood') {
          Checklist1_LubeOil_Edit_.checked = true;
      }
      Checklist1_LubeOil_Comment_Edit.value = Checklist1_Data.querySelector('.LubeOil_Comment').textContent;
      if (Checklist1_Data.querySelector('.FreshWater').textContent == 'Good') {
          Checklist1_FreshWater_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.FreshWater').textContent == 'NotGood') {
          Checklist1_FreshWater_Edit_.checked = true;
      }
      Checklist1_FreshWater_Comment_Edit.value = Checklist1_Data.querySelector('.FreshWater_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfMainEngine').textContent == 'Good') {
          Checklist1_ConditionOfMainEngine_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfMainEngine').textContent == 'NotGood') {
          Checklist1_ConditionOfMainEngine_Edit_.checked = true;
      }
      Checklist1_ConditionOfMainEngine_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfMainEngine_Comment').textContent;
      if (Checklist1_Data.querySelector('.LubeOil_Cons_hour_Engine').textContent == 'Good') {
          Checklist1_LubeOil_Cons_hour_Engine_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.LubeOil_Cons_hour_Engine').textContent == 'NotGood') {
          Checklist1_LubeOil_Cons_hour_Engine_Edit_.checked = true;
      }
      Checklist1_LubeOil_Cons_hour_Engine_Comment_Edit.value = Checklist1_Data.querySelector('.LubeOil_Cons_hour_Engine_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfGearBox').textContent == 'Good') {
          Checklist1_ConditionOfGearBox_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfGearBox').textContent == 'NotGood') {
          Checklist1_ConditionOfGearBox_Edit_.checked = true;
      }
      Checklist1_ConditionOfGearBox_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfGearBox_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfGenSet').textContent == 'Good') {
          Checklist1_ConditionOfGenSet_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfGenSet').textContent == 'NotGood') {
          Checklist1_ConditionOfGenSet_Edit_.checked = true;
      }
      Checklist1_ConditionOfGenSet_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfGenSet_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfBilgePump').textContent == 'Good') {
          Checklist1_ConditionOfBilgePump_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfBilgePump').textContent == 'NotGood') {
          Checklist1_ConditionOfBilgePump_Edit_.checked = true;
      }
      Checklist1_ConditionOfBilgePump_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfBilgePump_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfBilgeSystem').textContent == 'Good') {
          Checklist1_ConditionOfBilgeSystem_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfBilgeSystem').textContent == 'NotGood') {
          Checklist1_ConditionOfBilgeSystem_Edit_.checked = true;
      }
      Checklist1_ConditionOfBilgeSystem_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfBilgeSystem_Comment').textContent;
      if (Checklist1_Data.querySelector('.ConditionOfBattery').textContent == 'Good') {
          Checklist1_ConditionOfBattery_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ConditionOfBattery').textContent == 'NotGood') {
          Checklist1_ConditionOfBattery_Edit_.checked = true;
      }
      Checklist1_ConditionOfBattery_Comment_Edit.value = Checklist1_Data.querySelector('.ConditionOfBattery_Comment').textContent;
      if (Checklist1_Data.querySelector('.ShoreConnectionCables').textContent == 'Good') {
          Checklist1_ShoreConnectionCables_Edit.checked = true;
      } else if (Checklist1_Data.querySelector('.ShoreConnectionCables').textContent == 'NotGood') {
          Checklist1_ShoreConnectionCables_Edit_.checked = true;
      }
      Checklist1_ShoreConnectionCables_Comment_Edit.value = Checklist1_Data.querySelector('.ShoreConnectionCables_Comment').textContent;
  })
  Diagram1_CloseButton.addEventListener('click', () => {
      Diagram1.style.display = 'none';
      Diagram1_VesselStatus.classList.remove(Status);
  })
  Checklist1_PdfIcon.addEventListener('click', () => {
    let BoatName = Diagram1_VesselName.textContent;  
    let Checklist1Id = EditSmallBoats_ChecklistButton.nextElementSibling.textContent; 
    window.open('/Availability/Report/Checklists/SmallBoats/?Boat='+ BoatName + '&Id=' + Checklist1Id);
  })
});

EditSmallBoats_ChecklistButton.addEventListener('click', () => {
    let Checklist1Id = EditSmallBoats_ChecklistButton.nextElementSibling.textContent;
    EditSmallBoats_ChecklistButton.style.backgroundColor = '#1fb95e';
    EditSmallBoats_ChecklistButton.textContent = '+ Processing..';
    EditSmallBoats_ChecklistForm.setAttribute('action', '/Edit/Checklist1/' + Checklist1Id)
    EditSmallBoats_ChecklistForm.submit();
})