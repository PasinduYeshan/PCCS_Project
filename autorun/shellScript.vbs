Set WinScriptHost = CreateObject("WScript.shell")
WinScriptHost.Run  Chr(34) & "C:\xampp\htdocs\PCCS\autorun\script.bat" & Chr(34) , 0
Set WinScriptHost = Nothing